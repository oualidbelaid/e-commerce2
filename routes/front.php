<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\FavoriteController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', [ProductController::class, 'index'])->name('fproduct');
Route::get("/item/{id}", [ProductController::class, 'show'])->name('fproduct.show');
Route::get("/filtre", [ProductController::class, 'filtre'])->name('fproduct.filtre');
Route::get("/search", [ProductController::class, 'search'])->name('fproduct.search');
Route::get("/flutterproducts", [ProductController::class, 'flutter'])->name('product.flutter');

// Front Profile Route
Route::group(["prefix" => 'profile', "middleware" => "web", "controller" => ProfileController::class], function () {
    Route::get("/{id}", 'show')->name('fprofile');
    Route::get("/edit/{id}", 'edit')->name('fprofile.edit');
    Route::post("/update/{id}", 'update')->name('fprofile.update');
});

// Category Route
Route::group(["prefix" => 'category', "controller" => CategoryController::class], function () {
    Route::get("/{name}", 'index')->name("fcategory");
});

// Cart Route
Route::group(["prefix" => 'cart', "controller" => CartController::class], function () {
    Route::get("/", 'index')->name("cart");
    Route::get("/cartline/store", 'addProduct');
    Route::get("/cartline/update/{id}", 'updateProdut');
    Route::get("/cartline/destroy/{id}", 'deleteProduct');

});

// Favorite Route
Route::group(["prefix" => 'favorite', "controller" => FavoriteController::class, "middleware" => "auth"], function () {
    Route::get("/", 'index')->name("favorite");
    Route::get("/favoriteline/store", 'addProduct');
    Route::get("/favoriteline/update/{id}", 'updateProdut');
    Route::get("/favoriteline/destroy/{id}", 'deleteProduct');
});

// Order Route
Route::group(["prefix" => 'order', "controller" => OrderController::class], function () {
    Route::get("/", 'index')->name("order");
    Route::get("/orderlist", 'orderList')->name("order_list");
    Route::get("/store", 'store')->name("order_store");
    // Route::get("/favoriteline/update/{id}", 'updateProdut');
    // Route::get("/favoriteline/destroy/{id}", 'deleteProduct');
});

// Help Route
Route::get("/help", function () {
    return view("front/help.index");
})->name('help');
