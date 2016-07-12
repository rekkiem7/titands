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
}
