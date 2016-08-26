<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Menu;
use App\models\Empresa;
use App\models\Sucursal;
use App\models\Departamento;
use App\models\Rol;
use App\models\Permisos_rol;
class configuracion extends Model
{
    public static function verificar_usuario($usuario,$clave)
    {

        $resultado=DB::table('usuario')
            ->select('usuario.id', 'usuario.usuario','usuario.nombre','usuario.id_rol','usuario.id_depto','usuario.id_empresa','rol.nombre as nom_rol','usuario.imagen','empresa.skin','empresa.nombre as nom_empresa','departamento.nombre as nom_depto')
            ->join('rol', 'usuario.id_rol', '=', 'rol.id')
            ->join('departamento','usuario.id_depto','=','departamento.id')
            ->join('empresa','usuario.id_empresa','=','empresa.id')
            ->where('usuario.usuario',$usuario)
            ->where('usuario.pass',$clave)
            ->where('usuario.visible',1)
            ->get();
    	return $resultado;
    }

    public static function all_menus()
    {
    	$menus = Menu::where('id_padre', null)
                       ->orderBy('id', 'asc')
                       ->get();
    	return $menus;
    }

    public static function menus_hijos($menu)
    {
        $menus = Menu::where('id_padre',$menu)
                       ->orderBy('id', 'asc')
                       ->get();

        return $menus;
    }

    public static function all_empresas()
    {
        $empresas = Empresa::all();
        return $empresas;
    }

    public static function all_departamentos()
    {
        $deptos=Departamento::all();
        return $deptos;
    }

    public static function get_sucursales($empresa)
    {
        $sucursal=Sucursal::where('id_empresa',$empresa)
                            ->orderBy('id', 'asc')
                            ->get(['id','nombre']);    

        return $sucursal;       
    }

    public static function get_departamentos($empresa,$sucursal)
    {
        $deptos=Departamento::where('id_empresa',$empresa)
                            ->where('id_sucursal',$sucursal)
                            ->orderBy('id', 'asc')
                            ->get(['id','nombre']);    

        return $deptos;       
    }

    public static function get_roles($depto)
    {
        $roles=Rol::where('id_depto',$depto)
                    ->orderBy('id', 'asc')
                    ->get(['id','nombre']);
        return $roles;
    }

    public static function permisos_rol($rol)
    {
        $permisos=DB::table('permisos_rol')
            ->select('menu.id', 'menu.nombre', 'menu.clase','menu.id_padre','menu.url')
            ->join('menu', 'permisos_rol.id_menu', '=', 'menu.id')
            ->where('permisos_rol.id_rol',$rol)
            ->where('permisos_rol.visible',1)
            ->where('menu.visible',1)
            ->get();
        return $permisos;
    }

    public static function permisos_rol_padre($rol)
    {
        $permisos=DB::table('permisos_rol')
            ->select('menu.id', 'menu.nombre', 'menu.clase','menu.id_padre','menu.url')
            ->join('menu', 'permisos_rol.id_menu', '=', 'menu.id')
            ->where('permisos_rol.id_rol',$rol)
            ->where('permisos_rol.visible',1)
            ->where('menu.visible',1)
            ->where('menu.id_padre',null)
            ->get();
        return $permisos;
    }

    public static function permisos_rol_hijos($menu,$rol,$depto,$empresa)
    {
        $permisos=DB::table('permisos_rol')
            ->select('menu.id', 'menu.nombre', 'menu.clase','menu.id_padre','menu.url')
            ->join('menu', 'permisos_rol.id_menu', '=', 'menu.id')
            ->where('permisos_rol.id_rol',$rol)
            ->where('permisos_rol.id_depto',$depto)
            ->where('permisos_rol.id_empresa',$empresa)
            ->where('permisos_rol.visible',1)
            ->where('menu.visible',1)
            ->where('menu.id_padre',$menu)
            ->get();
        return $permisos;
    }

    public static function info_menu($menu)
    {
        $info=Menu::where('id',$menu)
                       ->get();
        return $info;
    }

    public static function existe_permiso_rol($menu,$rol,$depto,$empresa)
    {
        $permisos=DB::table('permisos_rol')
            ->where('permisos_rol.id_rol',$rol)
            ->where('permisos_rol.id_depto',$depto)
            ->where('permisos_rol.id_empresa',$empresa)
            ->where('permisos_rol.id_menu',$menu)
            ->get();
        return $permisos;
    }

    public static function update_permiso_rol($id,$data)
    {
        $update=DB::table('permisos_rol')->where('id', $id)->update($data);
        return $update;
    }

    public static function insert_permiso_rol($data)
    {
         $id = DB::table('permisos_rol')->insertGetId($data);
        return $id;
    }




}
