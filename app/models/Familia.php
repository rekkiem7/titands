<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table ="familia";

    protected $fillable=['id','nombre','id_empresa','visible'];
}
