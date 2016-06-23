<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table ="categoria";

    protected $fillable=['id','nombre','id_familia','id_empresa','visible'];
}
