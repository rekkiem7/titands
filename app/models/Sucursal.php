<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table ="sucursal";

    protected $fillable=['id','nombre','id_empresa','visible'];
}
