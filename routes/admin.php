<?php
/* Admin Route */

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AttributController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\API\NotificationController as APINotificationController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin", "middleware" => ["auth", "is_admin"]], function () {

    // API Route
    Route::group(["prefix" => 'api'], function () {

        // API Notification Route
        Route::group(["prefix" => 'notifications', "controller" => APINotificationController::class], function () {
            Route::get("/", 'index')->name('api.notification.index');
            Route::get("/destroy/{id}", 'destroy')->name('api.notification.destroy');
        });

    });

    Route::group(["controller" => AdminController::class], function () {
        Route::get("/", 'index')->name('admin');

    });

    // Notification Route
    Route::group(["prefix" => 'notifications', "controller" => NotificationController::class], function () {
        Route::get("/", 'index')->name('notification');
        Route::get("/{id}", 'show')->name('notification.show');
        Route::get("/destroy/{id}", 'destroy')->name('notification.destroy');
    });

    // Ecommerce Route
    Route::group(["prefix" => "ecommerce"], function () {
        // Product Route
        Route::group(["prefix" => 'products', "controller" => ProductController::class], function () {
            Route::get("/", 'index')->name('product');
            Route::get("/create", 'create')->name('product.create');
            Route::post("/store", 'store')->name('product.store');
            Route::get("/destroyAttrPr/{id}", 'removeAttributProduct')->name('product.destroyAttrPr');
            Route::get("/edit/{id}", 'edit')->name('product.edit');
            Route::post("/update/{id}", 'update')->name('product.update');
            Route::get("/destroy/{id}", 'destroy')->name('product.destroy');
            Route::get("/sr", 'search')->name('product.search');


        });

        //Order Route
        Route::group(["prefix" => 'order', "controller" => OrderController::class], function () {
            Route::get("/", 'index')->name('aorder');
            Route::get("/show/{name}", 'show')->name('aorder.show');
            Route::get("/update/{id}", 'update')->name('aorder.update');
            Route::get("/destroy/{id}", 'destroy')->name('aorder.destroy');
        });

        //Customers Route
        Route::group(["prefix" => 'customers', "controller" => CustomerController::class], function () {
            Route::get("/", 'index')->name('customer');
            Route::get("/show/{name}", 'show')->name('customer.show');
            Route::get("/destroy/{id}", 'destroy')->name('customer.destroy');
        });
    });

    // Category Route
    Route::group(["prefix" => "category"], function () {
        // Category Route
        Route::group(["prefix" => 'categories', "controller" => CategoryController::class], function () {
            Route::get("/", 'index')->name('category');
            Route::get("/store", 'store')->name('category.store');
            Route::post("/update/{id}", 'update')->name('category.update');
            Route::get("/destroy/{id}", 'destroy')->name('category.destroy');
        });
        // SubCategory Route
        Route::group(["prefix" => 'subcategories', "controller" => SubCategoryController::class], function () {
            Route::get("/", 'index')->name('subcategory');
            Route::get("/store", 'store')->name('subcategory.store');
            Route::post("/update/{id}", 'update')->name('subcategory.update');
            Route::get("/destroy/{id}", 'destroy')->name('subcategory.destroy');
        });
        // Attribut Route
        Route::group(["prefix" => 'attributs', "controller" => AttributController::class], function () {
            Route::get("/", 'index')->name('attribut');
            Route::get("/store", 'store')->name('attribut.store');
            Route::post("/update/{id}", 'update')->name('attribut.update');
            Route::get("/destroy/{id}", 'destroy')->name('attribut.destroy');
        });

    });

    // Contacts Route
    Route::group(["prefix" => "contacts", "controller" => ContactController::class], function () {

        // Admin Profile Route
        Route::group(["prefix" => 'profile', "middleware" => "web", "controller" => ProfileController::class], function () {
            Route::get("/{id}", 'show')->name('profile');
            Route::get("/edit/{id}", 'edit')->name('profile.edit');
            Route::post("/update/{id}", 'update')->name('profile.update');
        });

        //Users
        Route::prefix("users")->group(function () {
            Route::get("/", 'users')->name('user');
            Route::get("/show/{name}", 'show')->name('user.show');
            Route::get("/destroy/{id}", 'removeUser')->name('user.destroy');
        });

        // Admins
        Route::prefix("admins")->group(function () {
            Route::get("/", 'admins')->name('admins');
            Route::get("/show/{name}", 'show')->name('admins.show');
            Route::get("/AddAdmin/{id}", 'store')->name('admins.store');
            Route::get("/removeAdmin/{id}", 'destroy')->name('admins.destroy');
        });

    });

});
