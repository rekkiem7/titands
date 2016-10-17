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

class ConfiguracionController extends Controller
{
   /****************************************************************************************/
    public function index()
    {
       if (Session::get('logeado')==true){
            return Redirect::to('/home');
            
        }else{
            //return View::make('login/login');
            return Redirect::to('/inicio');
        }   
    } 

    public function inicio()
    {
        return view('login');
    }

    public function login()
    {
        $userdata = array(
            'nombre_usuario' => Request::get('usuario'),
            'clave'=> Request::get('clave')
           // 'clave'=> md5(Request::get('clave'))
        );

        $login=$this->iniciar_login($userdata);
        if($login==1)
        {
            return Redirect::to('/home');
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function iniciar_login($data)
    {
        
      $datos=configuracion::verificar_usuario($data['nombre_usuario'],$data['clave']);

      if($datos)
      {
         Session::put('logeado',     true);
         Session::put('id_usuario',   $datos[0]->id);
         Session::put('nom_usuario', $datos[0]->usuario);
         Session::put('id_rol',         $datos[0]->id_rol);
         Session::put('nom_rol',         $datos[0]->nom_rol);
         Session::put('id_depto',         $datos[0]->id_depto);
         Session::put('nombre_completo',         $datos[0]->nombre);
         Session::put('nombre_corto',         $datos[0]->nombre1.' '.$datos[0]->apellido_paterno);

          if($datos[0]->avatar=="" || $datos[0]->avatar===null)
          {
              $datos[0]->avatar=$datos[0]->imagen;
          }
         Session::put('imagen',         $datos[0]->avatar);
         Session::put('id_empresa',  $datos[0]->id_empresa);
         Session::put('nom_empresa',$datos[0]->nom_empresa);
         Session::put('nom_depto',$datos[0]->nom_depto);
         Session::put('skin',  $datos[0]->skin);
        return 1;
      }
      else
      {
        Session::put('error',"Los datos de acceso no coinciden con nuestras credenciales");
        return 0;
      }
      
    }

    public function home()
    {
        if (Session::get('logeado')==true)
        {
        $data['titulo']='Últimas Noticias';
        $data['subtitulo']="Sistema ERP Tomahawk";
        $rol=Session::get('id_rol');
        //$data['menus']=configuracion::permisos_rol_padre($rol);
        $data['menus']=$this->menus_padres($rol);
        $data['block_menu']="hold-transition sidebar-collapse sidebar-min ".Session::get('skin');
        return view('home.slider',$data);
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function logout()
    {
     
        Session::flush();
        return Redirect::to('/');    
    }

    /***********************************************************************************************************************/

    public function configuracion($menu)
    {
      $data['titulo']='Configuración';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['block_menu']=Session::get('skin');
      $data['menus']=$this->menus_generales($menu);
      return view('configuracion.index',$data);
    }

    public function permisos_rol($menu)
    {
      $data['titulo']="Permisos Por Rol ";
      $data['subtitulo']="Sistema ERP Tomahawk"; 
      $data['block_menu']=Session::get('skin');
      $data['menus']=$this->menus_generales($menu);
      $data["empresas"]=configuracion::all_empresas();
      return view('configuracion.permisos_rol',$data);
    }

    public function get_sucursal()
    {
      $empresa=$_POST['empresa'];
      try{
        $datos=configuracion::get_sucursales($empresa);
        if($datos)
        {
          return json_encode($datos);
        }
        else
        {
          return 0;
        }
      }
      catch (Exception $e) {
         return 0;
        }
    }

    public function get_departamentos()
    {
      $empresa=$_POST['empresa'];
      $sucursal=$_POST['sucursal'];
      try{
        $datos=configuracion::get_departamentos($empresa,$sucursal);
        if($datos)
        {
          return json_encode($datos);
        }
        else
        {
          return 0;
        }
      }
      catch (Exception $e) {
         return 0;
        }
      
    }

    public function get_roles()
    {
      $depto=$_POST['dpto'];
      try{
        $datos=configuracion::get_roles($depto);
        if($datos)
        {
          return json_encode($datos);
        }
        else
        {
          return 0;
        }
      }
      catch (Exception $e) {
         return 0;
        }
    }

    public function get_permisos_rol()
    {
      $rol=$_POST['rol'];
      $arreglo=array();
      try{
        $menus_padres=configuracion::all_menus();
        $permisos=configuracion::permisos_rol($rol);
        array_push($arreglo, $menus_padres);
        if($permisos)
        {
          array_push($arreglo, $permisos);
        }
        return json_encode($arreglo);
      }
      catch (Exception $e)
      {
       return 0; 
      }
    }

    public function get_permisos_rol_hijos()
    {
      try
      {
        $menu=$_POST['menu'];
        $rol=$_POST['rol'];
        $depto=$_POST['depto'];
        $empresa=$_POST['empresa'];
        $array=array();
        $info_menu=configuracion::info_menu($menu);
        array_push($array,$info_menu);
        $menus_hijos=configuracion::menus_hijos($menu);
        if(empty($menus_hijos))
        {
          $menus_hijos="";
          
        }
        $permisos=configuracion::permisos_rol_hijos($menu,$rol,$depto,$empresa);
        array_push($array,$menus_hijos);
        array_push($array,$permisos);
        return json_encode($array);
      }
      catch (Exception $e)
      {
        return 0;
      }
    }

    public function menus_padres($rol)
    {
      $menus=configuracion::permisos_rol_padre($rol);
      if($menus)
       {
          for($i=0;$i<count($menus);$i++)
          {
            $menus[$i]->hijos=[];
          }
       }
      return $menus;
    }

    public function menus_generales($menu)
    {
       $rol=Session::get('id_rol');
       $depto=Session::get('id_depto');
       $empresa=Session::get('id_empresa');
       $menus=configuracion::permisos_rol_hijos($menu,$rol,$depto,$empresa);
       if($menus)
       {
          for($i=0;$i<count($menus);$i++)
          {
            $new_id=$menus[$i]->id;
            $hijo=$this->menus_generales($new_id);
            $menus[$i]->hijos=$hijo;
          }
       }

       return $menus;
    }

    public function menus_hijos($menus)
    {
      $rol=Session::get('id_rol');
      $depto=Session::get('id_depto');
      $empresa=Session::get('id_empresa');
      $menus_hijos=array();
      for($i=0;$i<count($menus);$i++)
      {
        $mh=configuracion::permisos_rol_hijos($menus[$i]->id,$rol,$depto,$empresa);
        array_push($menus_hijos, $mh);
      }

      return $menus_hijos;
    }

    public function actualizar_modulo_sinhijos()
    {
      $menu=$_POST['menu'];
      $accion=$_POST['accion'];
      $rol=$_POST['rol'];
      $depto=$_POST['depto'];
      $empresa=$_POST['empresa'];

      $existe=configuracion::existe_permiso_rol($menu,$rol,$depto,$empresa);
      if($existe)
      {
        $data=['visible'=>$accion];
        $update=configuracion::update_permiso_rol($existe[0]->id,$data);
        return $update;
      }
      else
      {
        $data=['id_menu'=>$menu,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
        $insert=configuracion::insert_permiso_rol($data);
        return $insert;
      }
    }

     public function actualizar_modulo_conhijos()
    {
      $menu=$_POST['menu'];
      $accion=$_POST['accion'];
      $rol=$_POST['rol'];
      $depto=$_POST['depto'];
      $empresa=$_POST['empresa'];
      $existe=configuracion::existe_permiso_rol($menu,$rol,$depto,$empresa);
      if($existe)
      {
        $data=['visible'=>$accion];
        $update=configuracion::update_permiso_rol($existe[0]->id,$data);
        if($update)
        {
          $this->recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa);
          return $update;
        }
        else
        {
          return 0;
        }
      }
      else
      {
        $data=['id_menu'=>$menu,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
        $insert=configuracion::insert_permiso_rol($data);
        if($insert)
        {
           $this->recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa);
           return $insert;
        }
        else
        {
          return 0;
        }
      }

    }

    public function recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa)
    {
        $menus_hijos=configuracion::menus_hijos($menu);

        if($menus_hijos)
        {
          for($i=0;$i<count($menus_hijos);$i++)
          { 
            $existe=configuracion::existe_permiso_rol($menus_hijos[$i]->id,$rol,$depto,$empresa);
            if($existe)
            {
              $data=['visible'=>$accion];
              $update=configuracion::update_permiso_rol($existe[0]->id,$data);
              $this->recursivo_permisos_rol($menus_hijos[$i]->id,$accion,$rol,$depto,$empresa);
            }
            else
            {
               $data=['id_menu'=>$menus_hijos[$i]->id,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
               $insert=configuracion::insert_permiso_rol($data);
               $this->recursivo_permisos_rol($menus_hijos[$i]->id,$accion,$rol,$depto,$empresa);
            }
          }
        }
    }
    
    public function ingresar_como_usuario($menu)
    {
        if (Session::get('logeado')==true)
        {
            try{
                $rol=Session::get("id_rol");
                $usuario=Session::get("id_usuario");
                $depto=Session::get("id_depto");
                $empresa=Session::get("id_empresa");
                $permiso=$this->verificar_permisos($usuario,$empresa,$depto,$rol,$menu);
                if($permiso)
                {
                    $data['titulo'] = "Ingresar como un Usuario";
                    $data['menu'] = $menu;
                    $data['subtitulo'] = "Sistema ERP Tomahawk";
                    $data['block_menu'] = Session::get('skin');
                    $data['menus'] = $this->menus_generales($menu);
                    $data["empresas"]=configuracion::all_empresas();
                    return view('configuracion.ingresar_como', $data);
                }
                else
                {
                 return view('prohibido');
                }
            }
            catch (\Exception $e){
                $data['message']= '<strong>Message</strong>: '.$e->getMessage().'<br><strong>File</strong>:'.$e->getFile().'<br><strong>Line '.$e->getLine().'</strong>';
                return view('exception',$data);
            }
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function cargar_usuarios_xfiltro()
    {
        if (Session::get('logeado')==true) {
            $empresa=$_POST["empresa"];
            $sucursal=$_POST["sucursal"];
            $depto=$_POST["depto"];
            $rol=$_POST["rol"];
            $datos=configuracion::get_usuarios_for_filter($empresa,$sucursal,$depto,$rol);
            if($datos)
            {
                return response(["result"=>1,"data"=>json_encode($datos)]);
            }
            else
            {
                return response(["result"=>0,"titulo"=>"Sin Registros","error"=>"No se han encontrado registros de usuarios en el sistema"]);
            }
        }
        else {
            return response(["result"=>2,"error"=>"Sesión Expirada"]);
        }
    }

    public function verificar_permisos($usuario,$empresa,$depto,$rol,$menu)
    {
        $permisosUsuario=[];
        if(!$permisosUsuario)
        {
            $permisosUsuario=configuracion::select_permisos_rol($empresa,$depto,$rol,$menu);
        }
        return $permisosUsuario;
    }

    
}
