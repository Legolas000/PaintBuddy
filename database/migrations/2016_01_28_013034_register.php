<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Register extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('register',function(Blueprint $table){

            $table->string('FirstName');
            $table->string('LastName');
            $table->string('UserName')->unique();
            $table->string('Address');
            $table->integer('PhoneNo');
            $table->string('PassWord');

            $table->primary('UserName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('register');
    }
}
