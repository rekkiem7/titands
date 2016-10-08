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

    public static function select_nombre_usuario_usuario($usuario)
    {
        $dato=DB::table("usuario")->where("usuario",$usuario)->get();
        return $dato;
    }

    public static function insert_usuario($data)
    {
        $id=DB::table('usuario')->insertGetId($data);
        return $id;
    }

    public static function insert_usuario_detalle($data)
    {
        $id=DB::table('usuario_detalle')->insertGetId($data);
        return $id;
    }

    public static function all_usuarios()
    {
        $datos=DB::table("usuario")->select("usuario.id","usuario.usuario","usuario.nombre","empresa.nombre as empresa","departamento.nombre as departamento","sucursal.nombre as sucursal","rol.nombre as rol","usuario_detalle.nombre1","usuario_detalle.nombre2","usuario_detalle.apellido_paterno","usuario_detalle.apellido_materno","usuario.visible")
                    ->leftjoin("usuario_detalle","usuario.id","=","usuario_detalle.id_usuario")
                    ->join("empresa","usuario.id_empresa","=","empresa.id")
                    ->join("departamento","usuario.id_depto","=","departamento.id")
                    ->join("sucursal","departamento.id_sucursal","=","sucursal.id")
                    ->join("rol","usuario.id_rol","=","rol.id")->orderBy("usuario.id","desc")
                    ->get();
        return $datos;
    }

    public static function info_usuario($id)
    {
        $datos=DB::table("usuario")->select("usuario.id as iduser","usuario.usuario","usuario.pass","usuario.visible","usuario.id_rol","usuario.id_depto","usuario.id_empresa","empresa.nombre as empresa","departamento.nombre as departamento","sucursal.nombre as sucursal","rol.nombre as rol","usuario_detalle.*","usuario.imagen","usuario.nombre")
                    ->leftjoin("usuario_detalle","usuario.id","=","usuario_detalle.id_usuario")
                    ->join("empresa","usuario.id_empresa","=","empresa.id")
                    ->join("departamento","usuario.id_depto","=","departamento.id")
                    ->join("sucursal","departamento.id_sucursal","=","sucursal.id")
                    ->join("rol","usuario.id_rol","=","rol.id")->orderBy("usuario.id","desc")
                    ->where("usuario.id",$id)->get();
        return $datos;
    }

    public static function delete_usuario_detalle($id)
    {
        $delete=DB::table('usuario_detalle')->where('id_usuario',$id)->delete();
        return $delete;
    }

    public static function delete_usuario($id)
    {
        $delete=DB::table('usuario')->where('id',$id)->delete();
        return $delete;
    }
}
