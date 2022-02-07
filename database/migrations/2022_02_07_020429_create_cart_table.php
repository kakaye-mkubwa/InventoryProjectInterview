<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('productID')->unsigned();
            $table->foreign('productID')->references('id')->on('product');
            $table->integer('quantity')->unsigned();
            $table->decimal('sellingPrice',14,2)->unsigned();
            $table->bigInteger('soldBy')->unsigned();
            $table->foreign('soldBy')->references('id')->on('users');
            $table->decimal('vat',14,2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
