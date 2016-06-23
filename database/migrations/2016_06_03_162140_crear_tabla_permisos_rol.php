<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPermisosRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_menu')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->integer('id_depto')->unsigned(); 
            $table->integer('id_empresa')->unsigned();
            $table->integer('agregar');
            $table->integer('editar');
            $table->integer('eliminar');
            $table->integer('reportes');
            $table->integer('visible');
            $table->timestamps();
            $table->foreign('id_menu')->references('id')->on('menu');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->foreign('id_depto')->references('id')->on('departamentos');
            $table->foreign('id_empresa')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permisos_rol');
    }
}
