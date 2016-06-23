<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="producto";
    protected $fillable=['id','codigo','nombre','tipo','familia','categoria','unidadMedida','precioVenta','cantidadMinimaVenta','precioPorMayor','cantidadPrecioPorMayor','visible','disponiblePedidos','mostrarPrecio','disponibleOnline','descripcion'];
}
