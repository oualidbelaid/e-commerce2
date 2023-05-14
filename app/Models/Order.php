<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "visitor", "total", "visitor", "name", "phone", "address", "payment_option", "order_notes"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderlines()
    {
        return $this->hasMany(OrderLine::class);
    }
}
