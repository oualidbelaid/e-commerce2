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
        Schema::create('attribut_products', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id")->unsigned();
            $table->string('value');
            $table->integer("attribut_id")->unsigned();

            $table->timestamps();
            $table->foreign('attribut_id')->references('id')->on('attributs')
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
        Schema::dropIfExists('attribut_products');
    }
};
