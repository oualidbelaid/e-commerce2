<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $products = [];
        foreach (Auth::user()->cart as $item) {
            array_push($products, $item->product);
        }
        return $products;
    }

    public function store(Request $request)
    {
        $request->validate([
            "product_id" => "required",
        ]);
        $cartExist = Cart::where(["user_id" => Auth::id(), "product_id" => $request->product_id])->first();
        if ($cartExist == null) {
            $cart = Cart::create([
                "user_id" => Auth::id(),
                "product_id" => $request->product_id,
            ]);
            $product = $cart->product;
            return response()->json(['success' => true, "exist" => false, 'product' => $product]);
        } else {
            return response()->json(['success' => true, "exist" => true]);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::where(["user_id" => Auth::id(), "product_id" => $id])->first();
        $cart->quantity = $request->quantity;
        if ($cart->save()) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);

    }
    public function destroy($id)
    {
        $cart = Cart::where(["user_id" => Auth::id(), "product_id" => $id])->first();
        $cart->delete();
        return response()->json(['success' => true]);
    }
}
