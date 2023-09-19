<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class UpdateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   
        Schema::create('OrderItems', function (Blueprint $table) {
            $table->id(); 
            $table->integer('quantity')->nullable();
            $table->decimal('item_price', 10, 2)->nullable();


            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('orders_id')->references('id')->on('orders'); 

    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrderItems');
    }
}
