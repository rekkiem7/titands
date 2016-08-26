<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table ="departamento";

    protected $fillable=['id','nombre','id_empresa','id_sucursal','visible'];
}
