<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\UnidadMedida;
use App\models\Familia;
use App\models\Categoria;
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

    public static function get_categorias($empresa,$familia)
    {
        $categorias = Categoria::where('id_empresa',$empresa)
                        ->where('id_familia',$familia)
                        ->orderBy('id', 'asc')
                        ->get();

        return $categorias;
    }
}
