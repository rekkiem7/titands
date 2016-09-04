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
use App\models\mantenedores;
use App\models\configuracion;

class MantenedoresController extends Controller
{
   public function index($menu)
   {
      if (Session::get('logeado')==true)
      {
         $data['titulo']='Mantenedores';
         $data['subtitulo']="Sistema ERP Tomahawk";
         $data['block_menu']=Session::get('skin');
         $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
         //dd($data['menus']);
         return view('mantenedores.index',$data);
      }
      else
      {
         return Redirect::to('/');
      } 
   } 

   public function crear_menu($menu)
   {
      if (Session::get('logeado')==true)
      {
         $data['titulo']=" Creación de Menú";
         $data['subtitulo']="Sistema ERP Tomahawk"; 
         $data['block_menu']=Session::get('skin');
         $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
         $data["all_menus"]=mantenedores::all_menus();
         return view('mantenedores.crear_menu',$data);
      }
      else
      {
         return Redirect::to('/');
      }   
   }

   public function verificar_url()
   {
      $url=$_POST['url'];
      $existe=mantenedores::verificar_url($url);
      if($existe)
      {
         return 0;
      }
      else
      {
         return 1;
      }
   }

   public function add_menu()
   {
      if (Session::get('logeado')==true)
      {
         $nombre=$_POST['nombre'];
         $id_padre=$_POST['id_padre'];
         $url=$_POST['url'];
         $icono=$_POST['icono'];

         if($id_padre==0)
         {
            $data=['nombre'=>$nombre,'url'=>$url,'clase'=>$icono,'visible'=>1];
         }
         else
         {
            $data=['nombre'=>$nombre,'id_padre'=>$id_padre,'url'=>$url,'clase'=>$icono,'visible'=>1];
         }

         $insert=mantenedores::insert_menu($data);
         if($insert)
         {
            $menu=mantenedores::select_menu($insert);
            $data=['url'=>$menu[0]->url.'/'.$insert];
            $update=mantenedores::update_menu($insert,$data);
            return 1;
         }
         else
         {
         return 0;
         }
      }
      else
      {
         return 'SINSESION';
      }
   }

   public function Listado_menu($menu)
   {
      if (Session::get('logeado')==true)
      {
         $data['titulo']=" Listado Menús";
         $data['subtitulo']="Sistema ERP Tomahawk"; 
         $data['block_menu']=Session::get('skin');
         $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
         $data["all_menus"]=mantenedores::all_menus();
         return view('mantenedores.listado_menu',$data);
      }
      else
      {
         return Redirect::to('/');
      }   
   }

   public function delete_menu()
   {
      if (Session::get('logeado')==true)
      {
         $menu=$_POST['id'];
         $estado=$_POST['estado'];
         $data=['visible'=>0];
         $delete=mantenedores::update_menu($menu,$data);
         if($delete)
         {
            return 1;
         }
         else
         {
            return 0;
         }
      }
      else
      {
        return "SINSESION";
      }
   }

   public function info_menu_editar()
   {
      if (Session::get('logeado')==true)
      {
         $id=$_POST['id'];
         $datos=mantenedores::select_menu_editar($id);
         if($datos)
         {
            return json_encode($datos);
         }
         else
         {
            return 0;
         }

      }
      else
      {
        return "SINSESION";
      }
   }

   public function crear_usuario($menu)
   {
      if (Session::get('logeado')==true)
      {
         $data['titulo']=" Crear Usuario";
         $data['subtitulo']="Sistema ERP Tomahawk"; 
         $data['block_menu']=Session::get('skin');
         $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
         $data["empresas"]=configuracion::all_empresas();
         return view('mantenedores.Usuarios.crear_usuario',$data);
      }
      else
      {
        return Redirect::to('/');
      }
   }
}
