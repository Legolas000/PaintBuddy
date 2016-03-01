<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Itemorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('itemorders',function(Blueprint $table){

           $table->integer('itID');
           $table->integer('ordID');


           $table->primary(['itID','ordID']);

//           $table->foreign('itemID')
//                 ->references('itID')->on('items')
//                 ->onDelete('cascade');
//
//           $table->foreign('orderID')
//               ->references('ordID')->on('orders')
//               ->onDelete('cascade');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('itemorders');
    }
}
