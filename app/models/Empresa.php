<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table ="empresa";

    protected $fillable=['id','nombre','skin','visible'];
}

