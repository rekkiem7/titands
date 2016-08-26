<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_padre')->unsigned()->nullable(); 
            $table->string('url');
            $table->string('icono')->nullable();
            $table->string('clase')->nullable();
            $table->integer('visible');
            $table->timestamps();
            $table->foreign('id_padre')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
