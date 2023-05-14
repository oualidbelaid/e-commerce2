<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_lines', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("product_id")->unsigned();
            $table->integer("cart_id")->unsigned();
            $table->integer("quantity");
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts')
                ->onDelete("cascade");
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_lines');
    }
};
