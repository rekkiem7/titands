<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductoLogistico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoLogistico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProducto');
            $table->string('codigo');
            $table->float('ancho');
            $table->float('alto');
            $table->float('profundidad');
            $table->integer('unidadDimensiones');
            $table->float('peso');
            $table->integer('unidadPeso'); 
            $table->float('cantidadPorUEmpaque');
            $table->float('anchoEmpaque');
            $table->float('altoEmpaque');
            $table->float('profundidadEmpaque');
            $table->integer('unidadDimensionesEmpaque');
            $table->float('pesoEmpaque');
            $table->integer('unidadPesoEmpaque');
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
         Schema::drop('productoLogistico');
    }
}
