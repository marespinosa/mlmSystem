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
            $table->unsignedBigInteger('OrderItems_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();

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
