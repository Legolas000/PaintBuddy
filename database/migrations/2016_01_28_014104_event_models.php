<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('event_models',function(Blueprint $table){

           $table->string('title');
           $table->tinyInteger('allDay');
           $table->date('start');
           $table->date('end');
           $table->integer('id');


           $table->primary('id');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_models');
    }
}
