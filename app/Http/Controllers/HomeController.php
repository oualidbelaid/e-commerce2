<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {

        $products = Product::orderBy('created_at', 'DESC')->paginate(8);
        return view('welcome')->with(["products" => $products, "nbr_pr" => count(Product::all()) / 8]);
        // $products = Product::find(166);
        // $p = $products->subCategories[0];
        // // return $p->categories[1]->products[0]->subCategories[0]->products[0]->categories;
        // return $p->products[0]->categories;

    }
}
