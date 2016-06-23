<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table ="unidad_medida";

    protected $fillable=['id','descripcion','abrev'];
}
