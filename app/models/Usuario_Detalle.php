<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Detalle extends Model
{
    protected $table ="usuario_detalle";

    protected $fillable=['id','id_usuario','nombre1','nombre2','apellido_paterno','apellido_materno','rut','sexo','direccion','correo','telefono','celular','avatar'];
}
