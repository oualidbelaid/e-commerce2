<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("product_id")->unsigned();
            $table->integer("subcategory_id")->unsigned();
            $table->timestamps();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')
                ->onDelete("cascade");
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sub_category');
    }
};
