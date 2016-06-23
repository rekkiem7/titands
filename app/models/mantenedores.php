<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\UnidadMedida;
use App\models\Familia;
class mantenedores extends Model
{
    public static function get_unidadMedida()
    {
    	$unidad = UnidadMedida::all();
        return $unidad;
    }

    public static function get_familia($empresa)
    {
    	$familias = Familia::where('id_empresa',$empresa)
                       ->orderBy('id', 'asc')
                       ->get();
        return $familias;
    }
}
