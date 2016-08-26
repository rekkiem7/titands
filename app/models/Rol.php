<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table ="rol";

    protected $fillable=['id','nombre','id_depto','visible'];
}
