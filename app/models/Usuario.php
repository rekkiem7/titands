<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table ="usuario";

    protected $fillable=['id','usuario','pass','nombre','imagen','id_rol','id_depto','id_empresa','visible'];
}
