<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('descp')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}