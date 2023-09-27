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
            $table->text('descp')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('category')->nullable();
            $table->decimal('stockistprice', 8, 2)->nullable();
            $table->decimal('srp', 8, 2)->nullable();

            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('orderitems_id')->nullable();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('orders_id')->references('id')->on('orders');
            $table->foreign('orderitems_id')->references('id')->on('OrderItems'); 
        
          
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

