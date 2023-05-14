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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->integer('visitor')->default(null);
            $table->float('total');
            $table->string("name");
            $table->integer("phone");
            $table->longText("address");
            $table->string("country");
            $table->string("state");
            $table->longText("order_notes");
            $table->longText("order_status");
            $table->string("payment_option");
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('orders');
    }
};
