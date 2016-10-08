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
         $data['menu']=$menu;
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

   public function verificar_disponibilidad_nombre_usuario()
   {
      if (Session::get('logeado')==true)
      {
         $usuario=$_POST['usuario'];
         $dato=mantenedores::select_nombre_usuario_usuario($usuario);
         if($dato)
         {
            return 0;
         }
         else
         {
            return 1;
         }
      }
      else
      {
         return "SINSESION";
      }
   }

   public function add_usuario()
   {
      if (Session::get('logeado')==true)
      {
         $nombre_usuario=$_POST['nombre_usuario'];
         $password=$_POST['password'];
         $empresa=$_POST['empresa'];
         $sucursal=$_POST['sucursal'];
         $departamento=$_POST['departamento'];
         $rol=$_POST['rol'];
         $visible=$_POST['visible'];
         $primer_nombre=$_POST['primer_nombre'];
         $segundo_nombre=$_POST['segundo_nombre'];
         $apellido_paterno=$_POST['apellido_paterno'];
         $apellido_materno=$_POST['apellido_materno'];
         $rut=$_POST['rut'];
         $sexo=$_POST['sexo'];
         $direccion=$_POST['direccion'];
         $correo=$_POST['correo'];
         $telefono=$_POST['telefono'];
         $celular=$_POST['celular'];
         $r_aux=explode('.',$rut);
         $rut_oficial='';
         for($a=0;$a<count($r_aux);$a++)
         {
            $rut_oficial.=$r_aux[$a];
         }
         if($visible==="true"){$visible=1;}else{$visible=0;}
         $time=date("Y-m-d H:i:s");
         $data1=["usuario"=>$nombre_usuario,"pass"=>$password,"nombre"=>$primer_nombre.' '.$segundo_nombre.' '.$apellido_paterno.' '.$apellido_materno,"id_rol"=>$rol,"id_depto"=>$departamento,"id_empresa"=>$empresa,"visible"=>$visible,"created_at"=>$time];
         $insert1=mantenedores::insert_usuario($data1);
         if($insert1)
         {
            /*****Almacenando foto de perfil*******/
            $nombre_archivo = $_FILES["archivo"]["name"];
            $ext=explode(".",$nombre_archivo);
            $idusuario=1000;
            $uploadfile = 'archivos_empresas/'.$empresa.'/profiles/'.$insert1.'_'.$rut_oficial.'.'.$ext[1];
            $subido = copy($_FILES['archivo']['tmp_name'], $uploadfile);

            if(file_exists($uploadfile))
            {
               $data2=["id_usuario"=>$insert1,"nombre1"=>$primer_nombre,"nombre2"=>$segundo_nombre,"apellido_paterno"=>$apellido_paterno,"apellido_materno"=>$apellido_materno,"rut"=>$rut_oficial,"sexo"=>$sexo,"direccion"=>$direccion,"correo"=>$correo,"telefono"=>$telefono,"celular"=>$celular,"avatar"=>$uploadfile,"created_at"=>$time];
               $insert2=mantenedores::insert_usuario_detalle($data2);
               if($insert2)
               {
                  return 1;
               }
               else
               {
                  return 2;
               }
            }
            else
            {
               return "PROBLEMASIMAGEN";
            }
            /**************************************/
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

   public function listado_usuarios($menu)
   {
      if (Session::get('logeado')==true)
      {
         $data['titulo']="Listado de Usuarios";
         $data['menu']=$menu;
         $data['subtitulo']="Sistema ERP Tomahawk";
         $data['block_menu']=Session::get('skin');
         $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
         return view('mantenedores.Usuarios.listado_usuarios',$data);
      }
      else
      {
         return Redirect::to('/');
      }
   }

   public function cargar_usuarios()
   {
      if (Session::get('logeado')==true)
      {
         $usuarios=mantenedores::all_usuarios();
         return json_encode($usuarios);
      }
      else
      {
         return "SINSESION";
      }
   }

   public function ver_usuario()
   {
      if (Session::get('logeado')==true)
      {
         $id=$_POST['id'];
         $usuario=mantenedores::info_usuario($id);
         return json_encode($usuario);
      }
      else
      {
         return "SINSESION";
      }
   }

   public function delete_usuario()
   {
      if (Session::get('logeado')==true)
      {
         $id=$_POST["id"];
         mantenedores::delete_usuario_detalle($id);
         $delete2=mantenedores::delete_usuario($id);
             if($delete2)
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
}
