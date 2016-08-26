<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario')->unique();
            $table->string('pass');
            $table->string('nombre')->nullable();
            $table->string('imagen');
            $table->integer('id_rol')->unsigned()->nullable(); 
            $table->integer('id_depto')->unsigned()->nullable(); 
            $table->integer('id_empresa')->unsigned()->nullable(); 
            $table->integer('visible');
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
        Schema::drop('usuario');
    }
}
