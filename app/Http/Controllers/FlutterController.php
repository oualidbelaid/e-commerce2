<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FlutterController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return json_encode($products);
    }
}
