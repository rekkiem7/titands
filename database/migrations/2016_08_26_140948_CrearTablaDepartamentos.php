<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_empresa')->unsigned()->nullable(); 
            $table->integer('id_sucursal')->unsigned()->nullable(); 
            $table->integer('visible');
            $table->timestamps();
            $table->foreign('id_sucursal')->references('id')->on('sucursal');
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
        Schema::drop('departamento');
    }
}
