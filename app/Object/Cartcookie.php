<?php
namespace App\Object;

use App\Models\Product;

class Cartcookie
{
    public $cartlines = array();
    public $total = 0;
    public function __construct($cookie)
    {
        if ($cookie) {
            foreach ($cookie as $item) {
                array_push($this->cartlines, json_decode($item));
            }
            // update promotion
            foreach ($this->cartlines as $item) {
                $product = Product::find($item->product->id);
                $item->promotion_value = $product->promotion != null ? $product->promotion->value : 0;
            }
            // calcul total
            foreach ($this->cartlines as $item) {
                $product = Product::find($item->product->id);
                if ($product->promotion) {
                    $this->total += ($product->price - ($product->promotion->value * $product->price) / 100) * $item->quantity;
                } else {
                    $this->total += $product->price * $item->quantity;
                }
            }
        }
    }
    public function productExist($id)
    {
        foreach ($this->cartlines as $item) {
            if ($item->product->id == $id) {
                return true;
            }
        }
        return false;
    }
    public function total()
    {
        foreach ($this->cartlines as $item) {
            $product = Product::find($item->product->id);
            if ($product->promotion) {
                $this->total += ($product->price - ($product->promotion->value * $product->price) / 100) * $item->quantity;
            } else {
                $this->total += $product->price * $item->quantity;
            }
        }
    }
}
