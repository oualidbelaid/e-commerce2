<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use App\Object\Cartcookie as ObjectCartcookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('welcome')->with("products", $products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $cart = new ObjectCartcookie(Cookie::get('cartlines'));
            return view('front.products.show')->with(["product" => $product, "in_cart" => $cart->productExist($id),
            ]);
        } else {
            return view("errors.404");
        }

    }

    // search
    public function search(Request $request)
    {
        $key = trim(strtolower($request->get('q')));
        $products = array();
        $prods = array();
        $prods = Product::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($prods as $pr) {
            array_push($products, $pr);
        }

        if (count($products) == 0) {
            foreach (Product::all() as $pr) {
                foreach ($pr->attributs as $att) {
                    if (str_contains($att->value, $key)) {
                        array_push($products, $pr);
                    }
                }
            }
        } else {
            if (is_array($prods)) {
                $prods = array_reverse($prods);
            }

        }

        // return $products;
        $nbr_pr = count($products) / 8;
        if (count($products) > 8) {
            if ($request->has("page")) {
                $products = array_slice($products, (($request->page - 1) * 8), ($request->page * 8));
            } else {
                $products = array_slice($products, 0, 8);
            }
        }
        return view("front/search.index")->with([
            'key' => $key,
            'products' => $products,
            "nbr_pr" => (float) $nbr_pr,
        ]);
    }
    public function filtre(Request $request)
    {

        $price = explode(";", $request->price);

        $products = Product::whereBetween('price', [$price[0], $price[1]])->paginate(8);
        if ($request->has("prom")) {
            $pr = Promotion::where("value", $request->prom)->get();
            return view('welcome')->with(["products" => $pr, "nbr_pr" => count($pr) / 8]);

        }

        return view('welcome')->with(["products" => $products, "nbr_pr" => count(Product::whereBetween('price', [$price[0], $price[1]])->get()) / 8]);

    }

    public function flutter()
    {
        $products = Product::all();
        return json_encode($products);
    }
}
