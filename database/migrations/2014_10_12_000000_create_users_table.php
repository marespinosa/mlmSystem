<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('presentAddress');
            $table->string('birthday');
            $table->string('status');
            $table->string('gender');
            $table->string('nationality');
            $table->string('sponsor_id_number');
            $table->string('phoneNumber');
            $table->string('userlevel');
            $table->string('generatedId');
            $table->string('acountStatus');
            $table->unsignedInteger('sponsor_usage_count')->default(0);
            $table->string('email')->nullable()->change();
            $table->string('profile_picture')->nullable();
            $table->string('company')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();

            $table->unsignedBigInteger('orderitems_id')->nullable();
            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();


            $table->foreign('orderitems_id')->references('id')->on('OrderItems');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('orders_id')->references('id')->on('orders'); 
           

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
