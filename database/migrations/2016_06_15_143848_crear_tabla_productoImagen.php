<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductoImagen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoImagen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProducto')->unsigned()->nullable(); 
            $table->string('codigo');
            $table->string('nombreImagen');
            $table->string('url');
            $table->boolean('visible');
            $table->timestamps();
            $table->foreign('idProducto')->references('id')->on('producto');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('productoImagen');
    }
}
