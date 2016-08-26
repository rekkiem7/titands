<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_familia')->unsigned()->nullable(); 
            $table->integer('id_empresa')->unsigned()->nullable(); 
            $table->string('visible');
            $table->timestamps();
            $table->foreign('id_familia')->references('id')->on('familia');
            $table->foreign('id_empresa')->references('id')->on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoria');
    }
}
