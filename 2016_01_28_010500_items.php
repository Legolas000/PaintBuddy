<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {


            $table->increments('itID');
            $table->string('itName',100);
            $table->string('itDescrip');
            $table->binary('imPath');
            $table->string('itSize',50);
            $table->integer('catRef');
            $table->double('price', 5, 2);

            $table->foreign('catRef')
                ->references('catID')->on('categories')
                ->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
