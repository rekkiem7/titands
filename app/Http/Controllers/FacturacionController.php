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

class FacturacionController extends Controller
{
    
    public function index()
    {
        
    }

    public function facturacion_test($menu)
    {
        try{
            if (Session::get('logeado')==true)
            {
                $rol=Session::get("id_rol");
                $usuario=Session::get("id_usuario");
                $depto=Session::get("id_depto");
                $empresa=Session::get("id_empresa");
                $permiso=app('App\Http\Controllers\ConfiguracionController')->verificar_permisos($usuario,$empresa,$depto,$rol,$menu);
                if($permiso) {
                    $data['perfiles'] = configuracion::get_perfiles(Session::get('id_usuario'));
                    $data['titulo'] = 'Prueba de Facturación API';
                    $data['subtitulo'] = "Sistema Tomahawk - ERP";
                    $data['menus_padres'] = "";
                    $data['block_menu'] = Session::get('skin');
                    $data['menus'] = app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
                    $data["menus_hijos"] = app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
                    return view('facturacion.facturacion_test', $data);
                }
                else{
                    return view('prohibido');
                }
            }
            else
            {
                return Redirect::to('/inicio');
            }
        }
        catch (\Exception $e){
        $data['message']= '<strong>Message</strong>: '.$e->getMessage().'<br><strong>File</strong>:'.$e->getFile().'<br><strong>Line '.$e->getLine().'</strong>';
        return view('exception',$data);
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
