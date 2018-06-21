<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('transports', function (Blueprint $table) {
		    $table->increments('id')->unsigned();
		    $table->string('name');
		    $table->string('direction');
		    $table->integer('number')->unsigned();
		    $table->tinyInteger('manual');
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
	    Schema::dropIfExists('trasports');
    }
}
