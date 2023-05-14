<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $fillable = ["name", "price", "photo", "amount", "description", "slug"];

    public function categories()
    {
        return $this->belongsToMany(Category::class); //exist table categry_product
    }
    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class); //exist table subcategry_product
    }
    public function attributs()
    {
        return $this->hasMany(AttributProduct::class);
    }
    public function promotion()
    {
        return $this->hasOne(Promotion::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class); //d'ont exist table producr_comment (refernce with id)
    }
}
