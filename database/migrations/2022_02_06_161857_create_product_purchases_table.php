<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('productID')->unsigned();
            $table->foreign('productID')->references('id')->on('product');
            $table->bigInteger('receivedBy')->unsigned();
            $table->foreign('receivedBy')->references('id')->on('users');
            $table->integer('quantity')->unsigned();
            $table->decimal('cost',14,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchases');
    }
}
