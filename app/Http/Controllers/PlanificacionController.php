<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use View;
use Input;
use Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Response;
use Cache;
use Validator;
use App\models\configuracion;

class PlanificacionController extends Controller
{
    public function index($menu){
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
                    $data['titulo'] = 'Planificación';
                    $data['subtitulo'] = "Sistema ERP Tomahawk";
                    $data['block_menu'] = Session::get('skin');
                    $data['menus'] = app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
                    //dd($data['menus']);
                    return view('planificacion.index', $data);
                }else{
                    return view('prohibido');
                }
            }
            else
            {
                return Redirect::to('/');
            }
        }
        catch (\Exception $e){
            $data['message']= '<strong>Message</strong>: '.$e->getMessage().'<br><strong>File</strong>:'.$e->getFile().'<br><strong>Line '.$e->getLine().'</strong>';
            return view('exception',$data);
        }
    }
    
}
