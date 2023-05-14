<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FavoriteLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("front/favorite.index")->with(["favorite" => Auth::user()->favorite, "nbr_pr" => count(Auth::user()->favorite->favoritelines) / 8]);
    }

    // add product in favorit line
    public function addProduct(Request $request)
    {
        $request->validate([
            "product_id" => "required",
        ]);
        $product = Product::find($request->product_id);
        // test if product exist in the cart line
        $productExist = FavoriteLine::where(["favorite_id" => Auth::user()->favorite->id, "product_id" => $request->product_id])->first();
        if ($productExist != null) {
            if ($request->has("login")) {
                return redirect()->back();
            }
            return response()->json(['success' => true, "exist" => true]);
        }
        $favoriteline = FavoriteLine::create([
            "favorite_id" => Auth::user()->favorite->id,
            "product_id" => $request->product_id,
        ]);
        if ($request->has("login")) {
            return redirect()->back();
        }
        return response()->json(['success' => true, "exist" => false, 'product' => $product]);
    }

    //delete cart line
    public function deleteProduct($id)
    {
        $favoriteline = FavoriteLine::find($id);
        $favoriteline->delete();
        return response()->json(['success' => true]);
    }
}
