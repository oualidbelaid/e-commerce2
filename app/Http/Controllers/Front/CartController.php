<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Object\Cartcookie;
use App\Object\CartLinecookie;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{

    public function index()
    {
        $cart = new Cartcookie(Cookie::get('cartlines'));
        // return $cart->cartlines;
        return view("front/cart.index")->with("cart", $cart);
    }

    // add product in cart line
    public function addProduct(Request $request)
    {
        $request->validate([
            "product_id" => "required",
        ]);
        $product = Product::find($request->product_id);

        if (Cookie::get('cartlines')) {
            $cart = new Cartcookie(Cookie::get('cartlines'));
            if ($cart->productExist($request->product_id)) {
                return response()->json(['success' => true, "exist" => true]);
            }
        }
        $id = time() . rand(1000, 9000);
        $promotionValue = $product->promotion != null ? $product->promotion->value : 0;
        $cartline = new CartLinecookie($id, $product, 1, $promotionValue);
        $timeCookie = 60 * 24 * 30; //30 days
        Cookie::queue("cartlines[" . $id . "]", json_encode($cartline), $timeCookie);

        return response()->json(['success' => true, "exist" => false, 'product' => $product]);
    }

    public function updateProdut(Request $request, $id)
    {
        $cart = new Cartcookie(Cookie::get('cartlines'));
        foreach ($cart->cartlines as $item) {
            if ($item->id == $id) {
                $product = Product::find($item->product->id);
                $promotionValue = $product->promotion != null ? $product->promotion->value : 0;
                $cartline = new CartLinecookie($id, $item->product, $request->quantity, $promotionValue);
                Cookie::queue("cartlines[" . $id . "]", json_encode($cartline), false);
            }
        }
        return response()->json(['success' => true]);
        return response()->json(['success' => false]);
    }

    //delete cart line
    public function deleteProduct($id)
    {
        $cart = new Cartcookie(Cookie::get('cartlines'));
        foreach ($cart->cartlines as $item) {
            if ($item->id = $id) {
                Cookie::queue(Cookie::forget('cartlines[' . $id . ']'));
            }
        }
        return response()->json(['success' => true]);
    }
}
