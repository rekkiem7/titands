<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductoImagenes extends Model
{
    protected $table ="productoImagen";
    protected $fillable=['id','idProducto','codigo','nombreImagen','url','visible'];
}
