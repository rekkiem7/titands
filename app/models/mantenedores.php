<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\UnidadMedida;
use App\models\Familia;
use App\models\Categoria;
use App\models\Menu;
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

    public static function all_menus()
    {
            $menus=DB::table('menu as m1')
                ->select('m1.id','m1.nombre','m1.id_padre','m2.nombre as nombre_padre')
                ->join('menu as m2', 'm1.id_padre', '=', 'm2.id','left')
                ->get();
            return $menus;
    }

    public static function verificar_url($url)
    {
        $menu=DB::table('menu')
            ->where('url',$url)
            ->get();
        return $menu;
    }

    public static function insert_menu($data)
    {
        $id=DB::table('menu')->insertGetId($data);
        return $id;
    }

    public static function update_menu($id,$data)
    {
        $update=DB::table('menu')->where('id', $id)->update($data);
        return $update;
    }

    public static function select_menu($id)
    {
        $menu=DB::table('menu')
            ->where('id',$id)
            ->get();
        return $menu;
    }

    public static function select_menu_editar($id)
    {
        $menus=DB::table('menu as m1')
            ->select('m1.id','m1.nombre','m1.id_padre','m2.nombre as nombre_padre','m1.url','m1.clase')
            ->join('menu as m2', 'm1.id_padre', '=', 'm2.id','left')
            ->where('m1.id',$id)
            ->get();
        return $menus;
    }
}
