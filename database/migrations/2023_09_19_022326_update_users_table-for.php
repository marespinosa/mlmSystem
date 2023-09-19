<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableFor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('OrderItems_id')->nullable();

            $table->foreign('OrderItems_id')->references('id')->on('OrderItems');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('orders_id')->references('id')->on('orders'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
