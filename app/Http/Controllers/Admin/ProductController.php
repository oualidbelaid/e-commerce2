<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribut;
use App\Models\AttributProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        if (count(Product::all()) == 0) {
            $categories = Category::all();
            $att_a = Attribut::all();
            return view('admin.products.create')->with("categories", $categories)->with("attributs", $att_a);
        }
        $products = Product::first()->paginate(5);
        return view("admin/products.index")->with(["products" => $products, "nbr_pr" => count(Product::all()) / 5]);
    }

    public function create()
    {
        $categories = Category::all();
        $att_a = Attribut::all();
        return view('admin.products.create')->with("categories", $categories)->with("attributs", $att_a);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "amount" => "integer",
            "min_quantity" => "integer",
            "price" => "integer",
            "description" => "required",
            "categories" => "required",
            "photos" => "required",
        ]);
        $urlphotos = '';
        foreach ($request->photos as $photo) {
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploadsbk/products', $newPhoto);
            $urlphotos .= 'uploadsbk/products/' . $newPhoto . "&&";
        }

        $product = Product::create([
            "name" => strtolower($request->name),
            "price" => $request->price,
            "photo" => $urlphotos,
            "amount" => $request->amount,
            "min_quantity" => $request->min_quantity,
            "description" => strtolower($request->description),
            "slug" => Str::slug($request->name, '-'),
        ]);
        $product->categories()->attach($request->categories);

        // if post the new attributs
        if ($request->has('attributs')) {
            foreach ($request->attributs as $key => $item) {
                if ($item != "") {
                    $att = AttributProduct::create([
                        "product_id" => $product->id,
                        "attribut_id" => $key,
                        "value" => strtolower($item),
                    ]);
                }
            }
        }

        // if post the promotion of the product
        if ($request->has('promotionValue')) {
            $request->validate([
                "promotionValue" => "integer|min:1|max:100",
                "expiryPromotion" => "required|date_format:Y-m-d",
            ]);
            Promotion::create([
                "product_id" => $product->id,
                "value" => $request->promotionValue,
                "expiry_date" => $request->expiryPromotion,
            ]);
        }

        $users = User::where("is_admin", 1)->get();
        Notification::send($users, new ProductNotification(Auth::user(), $product, "we have created new product"));
        return redirect()->route('product.edit', [$product->id]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $categories = Category::all();
            $att_a = Attribut::all();
            return view('admin.products.edit')->with(["product" => $product, "categories" => $categories, "attributs" => $att_a]);
        } else {
            return view('errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            "name" => "required",
            "price" => "integer",
            "amount" => "integer",
            "min_quantity" => "integer",
            "description" => "required",
            "categories" => "required",
        ]);

        $product = Product::find($id);
        $product->name = strtolower($request->name);
        $product->price = $request->price;

        if ($request->has('photos')) {
            foreach (explode("&&", $product->photo) as $photo) {
                File::delete($product->photo);
            }
            $urlphotos = '';
            foreach ($request->photos as $photo) {
                $newPhoto = time() . $photo->getClientOriginalName();
                $photo->move('uploadsbk/products', $newPhoto);
                $urlphotos .= 'uploadsbk/products/' . $newPhoto . "&&";
            }
            $product->photo = $urlphotos;
        }

        // if poste to update or new attributs
        if ($request->has('attributs')) {

            foreach ($request->attributs as $key => $item) {
                $existAtt = false;
                foreach ($product->attributs as $att) {
                    if ($att->attribut_id == $key) {
                        $existAtt = true;
                    }
                }

                if ($existAtt) {
                    $attrValue = AttributProduct::where(["product_id" => $product->id, "attribut_id" => $key])->first();
                    if ($item != "") {
                        $attrValue->value = strtolower($item);
                        $attrValue->save();
                    } else {
                        return redirect()->back()->withErrors(['The ' . $attrValue->attribut->name . ' field is required.']);
                    }
                } else {
                    AttributProduct::create([
                        "product_id" => $product->id,
                        "attribut_id" => $key,
                        "value" => $item,
                    ]);
                }

            }
        }
        // if post for update or delete promotion of the product
        if ($request->has('promotionValue')) {
            $request->validate([
                "promotionValue" => "integer|min:1|max:100",
                "expiryPromotion" => "required|date_format:Y-m-d",
            ]);
            if ($product->promotion != null) {
                $product->promotion->value = $request->promotionValue;
                $product->promotion->expiry_date = $request->expiryPromotion;
                $product->promotion->save();
            } else {
                Promotion::create([
                    "product_id" => $product->id,
                    "value" => $request->promotionValue,
                    "expiry_date" => $request->expiryPromotion,
                ]);
            }
        }
        if (!$request->has('promotionValue')) {
            $prm = Promotion::where("product_id", $product->id)->first();
            if ($prm != null) {

                $prm->delete();
            }
        }

        $product->amount = $request->amount;
        $product->min_quantity = $request->min_quantity;
        $product->description = strtolower($request->description);
        $product->categories()->sync($request->categories);
        $product->save();
        $users = User::where("is_admin", 1)->get();
        Notification::send($users, new ProductNotification(Auth::user(), $product, "we have update product"));
        return redirect()->back()->with('success', 'the product update');
    }
    public function removeAttributProduct($id)
    {
        $attr = AttributProduct::where('id', $id)->first();
        $attr->destroy($id);
        return redirect()->back()->with('success', 'The attribet product is removed');

    }
    public function destroy($id)
    {
        $product = Product::find($id);
        foreach (explode("&&", $product->photo) as $photo) {
            File::delete($photo);
        }
        $users = User::where("is_admin", 1)->get();
        Notification::send($users, new ProductNotification(Auth::user(), $product, "we have delete product"));
        $product->categories()->sync([]);
        if ($product->promotion != null) {

            $product->promotion->delete();
        }
        $product->destroy($id);
        return redirect()->route('product');
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
        return view("admin/products.index")->with([
            'key' => $key,
            'products' => $products,
            "nbr_pr" => (float) $nbr_pr,
        ]);
    }

}
