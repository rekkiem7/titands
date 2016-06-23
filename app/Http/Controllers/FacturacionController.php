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

class FacturacionController extends Controller
{
    
    public function index()
    {
        
    }

    public function facturacion_test($menu)
    {
        if (Session::get('logeado')==true)
        {
          $data['titulo']='Prueba de Facturación API';
          $data['subtitulo']="Sistema Tomahawk - ERP";
          $data['menus_padres']="";
          $data['block_menu']=Session::get('skin');
          $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
          $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);

          return view('facturacion.facturacion_test',$data);
        }
        else
        {
            return Redirect::to('/inicio');
        }  
    }

    public function facturasonline_token()
    {
       $grant_type=$_POST['grant_type'];
       $username=$_POST['username'];
       $password=$_POST['password'];


       $vars='grant_type='.$grant_type.'&username='.$username.'&password='.$password;
       $varsx=json_encode($vars);
      
       $request = Request::create('api.facturasonline.cl/token', 'POST',[$varsx]);
       return $request;
    }

    public function facturasonline_facuturaElectronica()
    {
         $varsx=json_encode($_POST);
         $request = Request::create('api.facturasonline.cl/documents/CreateManualInvoice', 'POST',[$varsx]);
         return $request;
    }

   
}
