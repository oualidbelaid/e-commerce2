<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use App\Object\Cartcookie;
use App\Object\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user() == null) {
        $cart = new Cartcookie(Cookie::get('cartlines'));
        // } else {
        //     $cart = Auth::user()->cart;
        // }
        return view("front/order.index")->with("cart", $cart);
    }
    // list de order
    public function orderList()
    {
        $orders = array();
        if (Auth::user() != null) {
            if (count(Auth::user()->orders) > 8) {
                $orders = Order::where("user_id", Auth::id())->orderBy('created_at', 'DESC')->paginate(8);
            } else {
                $orders = Order::where("user_id", Auth::id())->orderBy('created_at', 'DESC')->get();
            }
            $nbr_or = count(Auth::user()->orders);
        } else {
            $idOrders = array();
            if (Cookie::get('orders')) {
                foreach (Cookie::get('orders') as $item) {
                    array_push($idOrders, $item);
                }
            }
            $nbr_or = count(Order::find($idOrders));
            $orders = Order::orderBy('created_at', 'DESC')->paginate(8)->find($idOrders);
            // $orders = array_reverse($or);
            // return $orders;
        }
        return view("front/order.orderlist")->with(["orders" => $orders, "nbr_or" => $nbr_or / 8]);

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "phone" => "required|max:11",
            "address" => "required|string|max:150",
            // "country" => "required|string|max:50",
            // "state" => "required|string|max:50",
        ]);
        $cart = new Cartcookie(Cookie::get('cartlines'));
        if (count($cart->cartlines) > 0) {
            $order = Order::create([
                "user_id" => Auth::user() != null ? Auth::id() : null,
                "visitor" => Auth::user() == null ? 1 : 0,
                "total" => $cart->total,
                "name" => $request->name,
                "phone" => $request->phone,
                "address" => $request->address,
                "country" => $request->country,
                "state" => $request->state,
                "payment_option" => $request->payment_option,
                "order_notes" => $request->order_notes,
            ]);
            foreach ($cart->cartlines as $cl) {
                $product = Product::find($cl->product->id);
                $product->amount -= $cl->quantity;
                $product->save();

                if ($product->amount <= $product->min_quantity) {
                    $users = User::where("is_admin", 1)->get();
                    $sys = new System();
                    $sys->email = "system.quantity";
                    Notification::send($users, new ProductNotification($sys, $product, "The quantity of the product is almost finished"));
                }
                OrderLine::create([
                    "order_id" => $order->id,
                    "product_id" => $product->id,
                    "quantity" => $cl->quantity,
                    "promotion_value" => $product->promotion != null ? $product->promotion->value : 0,
                ]);
            }
            if (Auth::user() == null) {
                //if dont have account registr order in the cookie
                $id = time() . rand(1000, 9000);
                $timeCookie = 60 * 24 * 30; //30 days
                Cookie::queue("orders[" . $id . "]", $order->id, $timeCookie);

            }

            if (Auth::user() != null) {
                //  register the info
                if ($request->has("register")) {
                    $profile = Auth::user()->profile;
                    $profile->user->name = $request->name;
                    $profile->phone = $request->phone;
                    $profile->address = $request->address;
                    $profile->user->save();
                    $profile->save();
                }
            }
        }
        // destroy the panier
        foreach ($cart->cartlines as $item) {
            Cookie::queue(Cookie::forget('cartlines[' . $item->id . ']'));
        }
        return redirect()->route('order_list');
    }
}