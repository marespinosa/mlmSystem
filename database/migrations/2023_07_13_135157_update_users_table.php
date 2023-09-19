<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
            
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('OrderItems_id')->nullable();
            $table->unsignedBigInteger('products_id')->nullable();


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
