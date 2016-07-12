<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empresa');
            $table->string('codigo');
            $table->string('nombre');
            $table->integer('tipo');
            $table->integer('familia');
            $table->integer('categoria');
            $table->integer('unidadMedida');
            $table->float('precioVenta');
            $table->float('cantidadMinimaVenta');
            $table->float('precioPorMayor')->nullable();
            $table->float('cantidadPrecioPorMayor')->nullable();
            $table->boolean('visible');
            $table->boolean('disponiblePedidos');
            $table->boolean('mostrarPrecio');
            $table->boolean('disponibleOnline');
            $table->longText('descripcion')->nullable();
            $table->integer('usuario_creacion');
            $table->integer('usuario_modificacion')->nullable();
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
        Schema::drop('producto');
    }
}
