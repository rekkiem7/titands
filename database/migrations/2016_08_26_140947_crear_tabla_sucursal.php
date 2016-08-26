<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_empresa')->unsigned()->nullable();
            $table->integer('visible');
            $table->timestamps();
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
        Schema::drop('sucursal');
    }
}
