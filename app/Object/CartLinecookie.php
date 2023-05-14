<?php
namespace App\Object;

class CartLinecookie
{
    public $id;
    public $product;
    public $quantity;
    public $promotion_value = 0;
    public function __construct($id, $product, $quantity, $promotion_value)
    {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->promotion_value = $promotion_value != null ? $promotion_value : 0;

    }
}
