<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->float("total");
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
