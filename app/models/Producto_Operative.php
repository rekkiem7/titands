<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Producto;
class Producto_Operative extends Model
{
    public static function insert_producto($data)
    {
    	$id=DB::table('producto')->insertGetId($data);
        return $id;
    }

    public static function insert_productologistico($data)
    {
    	$id=DB::table('productologistico')->insertGetId($data);
        return $id;
    }

    public static function insert_productoimagen($data)
    {
    	$id=DB::table('productoimagen')->insertGetId($data);
        return $id;
    }

    public static function select_productos($empresa)
    {
    	$productos=Producto::where('id_empresa',$empresa)
                            ->orderBy('id', 'asc')
                            ->get(['id','codigo','nombre']);    

        return $productos;    
    }

    public static function select_producto_xid($id)
    {
    	$producto=DB::table('producto')
            ->join('productologistico', 'producto.id', '=', 'productologistico.idProducto')
            ->where('producto.id',$id)
            ->get();
    	return $producto;
    }

    public static function select_productoimagen($id)
    {
    	$producto=DB::table('productoimagen')
            ->select("url")
            ->where('productoimagen.idProducto',$id)
            ->get();
    	return $producto;
    }
}
