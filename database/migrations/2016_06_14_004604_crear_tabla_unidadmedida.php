<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUnidadmedida extends Migration
{
    public function up()
    {
        Schema::create('unidad_medida', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('abrev');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('unidad_medida');
    }
}
