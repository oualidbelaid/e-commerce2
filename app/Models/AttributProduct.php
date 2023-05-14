<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributProduct extends Model
{
    use HasFactory;
    protected $fillable = ["product_id", "attribut_id", "value"];

    public function attribut()
    {
        return $this->belongsTo(Attribut::class);

    }
    public function product()
    {
        return $this->belongsTo(Product::class);

    }
}
