<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
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
}
