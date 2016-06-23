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
use App\models\configuracion;

class PedidosController extends Controller
{
   public function pedidos($menu)
   {
   	
   		if (Session::get('logeado')==true)
   		{
			    $data['titulo']='Ingreso De Pedidos';
        	$data['subtitulo']="Sistema Williamson Industrial";
          $data['menus_padres']="";
          $data['block_menu']=Session::get('skin');
          $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
          $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);


        	return view('ing_pedidos.ingreso',$data);
        }
        else
        {
            return Redirect::to('/inicio');
        }  
   }

}
