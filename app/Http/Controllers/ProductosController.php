<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use Input;
use Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cache;
use Validator;
use  App\models\mantenedores;

class ProductosController extends Controller
{ 
    public function index($menu)
    {
      if (Session::get('logeado')==true)
      {
      $id_empresa=Session::get('id_empresa');
      $data['titulo']='Ficha de Productos';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['block_menu']=Session::get('skin');
      $data['menus_padres']="";
      $data['unidad_medida']=mantenedores::get_unidadMedida();
     // dd($data['unidad_medida']);
      $data['familia']=mantenedores::get_familia($id_empresa);
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      return view('productos.ficha_producto.index',$data);
      }else{
            //return View::make('login/login');
            return Redirect::to('/');
        }   
    }   
}
