<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('total_amount')->nullable();
            $table->string('status')->nullable();

            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('order_items_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
        
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('order_items_id')->references('id')->on('order_items'); 

         

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
        //
    }
}
