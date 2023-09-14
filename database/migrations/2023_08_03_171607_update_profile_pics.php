<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfilePics extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable();
            $table->string('company')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
