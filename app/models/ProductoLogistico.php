<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductoLogistico extends Model
{
    protected $table ="productoLogistico";
    protected $fillable=['id','idProducto','codigo','ancho','alto','profundidad','unidadDimensiones','peso','unidadPeso','cantidadPorUEmpaque','anchoEmpaque','altoEmpaque','profundidadEmpaque', 'unidadDimensionesEmpaque','pesoEmpaque','unidadPesoEmpaque'];
}
