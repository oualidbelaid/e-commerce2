<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

// use App\Http\Controllers\API\BaseController ;

class ProductController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            "asset" => URL::asset(""),
            'message' => $message,
        ];
        return $response;
    }
    public function index()
    {
        $products = Product::first()->paginate(5);
        return $this->sendResponse(ProductCollection::collection($products), "fff");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => "required",
            'price' => "required",
            'detail' => "required",
        ]);
        if ($validator->fails()) {
            return $this->sendError('please validate error', $validator->errors());
        }
        $product = Product::create($input);
        return $this->sendResponse(new ProductCollection($product), "product created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->sendError('product not found');
        } else {
            return $this->sendResponse(new ProductCollection($product), "product created successfully");

        }
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => "required",
            'price' => "required",
            'detail' => "required",
        ]);
        if ($validator->fails()) {
            return $this->sendError('please validate error', $validator->errors());
        }
        $product = Product::find($id);
        $product->name = $input["name"];
        $product->price = $input["price"];
        $product->detail = $input["detail"];
        $product->save();
        return $this->sendResponse(new ProductCollection($product), "product update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->destroy($id);
        return $this->sendResponse(new ProductCollection($product), "product destroy successfully");

    }
}
