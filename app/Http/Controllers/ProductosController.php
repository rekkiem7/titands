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
use App\models\Producto_Operative;

class ProductosController extends Controller
{ 
    public function index($menu)
    {
      if (Session::get('logeado')==true)
      {
      $id_empresa=Session::get('id_empresa');
      $data['titulo']='Módulo de Productos';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['block_menu']=Session::get('skin');
      $data['menus_padres']="";
      $data['unidad_medida']=mantenedores::get_unidadMedida();
     // dd($data['unidad_medida']);
      $data['familia']=mantenedores::get_familia($id_empresa);
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      return view('productos.index',$data);
      }else{
            //return View::make('login/login');
            return Redirect::to('/');
        }   
    }

    public function get_categorias()
    {
      if (Session::get('logeado')==true)
      {
        $familia=$_POST['familia'];
        $id_empresa=Session::get('id_empresa');
        $datos=mantenedores::get_categorias($id_empresa,$familia);
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

    public function add_producto()
    {
      if (Session::get('logeado')==true)
      {
          $tipo=$_POST['tipo'];
          $id_empresa=Session::get('id_empresa');
          $id_usuario=Session::get('id_usuario');
          if($tipo==1)
          {
            $familia=$_POST['familia'];
            $categoria=$_POST['categoria'];
            $nombre=$_POST['nombre'];
            $codigoGeneral=$_POST['codigoGeneral'];
            $unidadMedida=$_POST['unidadMedida'];
            $precioVenta=$_POST['precioVenta'];
            $cantidadMinimaVenta=$_POST['cantidadMinimaVenta'];
            $unidadCantidadMinimaVenta=$_POST['unidadCantidadMinimaVenta'];
            $precioPorMayor=$_POST['precioPorMayor'];
            $cantidadMinimaPorMayor=$_POST['cantidadMinimaPorMayor'];
            $visible=$_POST['visible'];
            $disponiblePedidos=$_POST['disponiblePedidos'];
            $mostrarPrecio=$_POST['mostrarPrecio'];
            $disponibleOnline=$_POST['disponibleOnline'];
            $descripcionProducto=$_POST['descripcionProducto'];
            $anchoProducto=$_POST['anchoProducto'];
            $unidadAnchoProducto=$_POST['unidadAnchoProducto'];
            $altoProducto=$_POST['altoProducto'];
            $unidadAltoProducto=$_POST['unidadAltoProducto'];
            $profundidadProducto=$_POST['profundidadProducto'];
            $unidadProfundidadProducto=$_POST['unidadProfundidadProducto'];
            $pesoProducto=$_POST['pesoProducto'];
            $unidadPesoProducto=$_POST['unidadPesoProducto'];
            $cantidadEmpaque=$_POST['cantidadEmpaque'];
            $unidadCantidadEmpaque=$_POST['unidadCantidadEmpaque'];
            $anchoEmpaque=$_POST['anchoEmpaque'];
            $unidadAnchoEmpaque=$_POST['unidadAnchoEmpaque'];
            $altoEmpaque=$_POST['altoEmpaque'];
            $unidadAltoEmpaque=$_POST['unidadAltoEmpaque'];
            $profundidadEmpaque=$_POST['profundidadEmpaque'];
            $unidadProfundidadEmpaque=$_POST['unidadProfundidadEmpaque'];
            $pesoEmpaque=$_POST['pesoEmpaque'];
            $unidadPesoEmpaque=$_POST['unidadPesoEmpaque'];

            $data1=['id_empresa'=>$id_empresa,'codigo'=>$codigoGeneral,'nombre'=>$nombre,'tipo'=>$tipo,'familia'=>$familia,'categoria'=>$categoria,'unidadMedida'=>$unidadMedida,'precioVenta'=>$precioVenta,'cantidadMinimaVenta'=>$cantidadMinimaVenta,'precioPorMayor'=>$precioPorMayor,'cantidadPrecioPorMayor'=>$cantidadMinimaPorMayor,'visible'=>$visible,'disponiblePedidos'=>$disponiblePedidos,'mostrarPrecio'=>$mostrarPrecio,'disponibleOnline'=>$disponibleOnline,'descripcion'=>$descripcionProducto,'usuario_creacion'=>$id_usuario];
            $insert=Producto_Operative::insert_producto($data1);
            if($insert)
            {

              $data2=['idProducto'=>$insert,'codigo'=>$codigoGeneral,'ancho'=>$anchoProducto,'alto'=>$altoProducto,'profundidad'=>$profundidadProducto,'unidadDimensiones'=>$unidadAnchoProducto,'peso'=>$pesoProducto,'unidadPeso'=>$unidadPesoProducto,'cantidadPorUEmpaque'=>$cantidadEmpaque,'anchoEmpaque'=>$anchoEmpaque,'altoEmpaque'=>$altoEmpaque,'profundidadEmpaque'=>$profundidadEmpaque,'unidadDimensionesEmpaque'=>$unidadAnchoEmpaque,'pesoEmpaque'=>$pesoEmpaque,'unidadPesoEmpaque'=>$unidadPesoEmpaque];
              $insert2=Producto_Operative::insert_productologistico($data2);
              $count = count($_FILES['archivos']['name']);
              $hoy=getdate();
              for ($i = 0; $i < $count; $i++) {
                $z=$i+1;
                 // echo $_FILES['archivos']['name'][$i].'<br/>';
                $nombre_archivo = $_FILES["archivos"]["name"][$i];
                $tipo_archivo = $_FILES["archivos"]["type"][$i];
                $tamano_archivo = $_FILES["archivos"]["size"][$i];
                $tmp_archivo = $_FILES["archivos"]["tmp_name"][$i];
                $ext1=explode(".",$nombre_archivo); 
                $ext=$ext1[1];
                $nombre_imagen=$insert.'_archivo'.$z.'_'.$codigoGeneral.'_'.$id_usuario.'_'.$hoy["mday"].'_'.$hoy["mon"].'_'.$hoy["year"].'.'.$ext;
                $url='archivos_empresas/'.$id_empresa.'/productos/'.$nombre_imagen;
                $subido = copy($_FILES['archivos']['tmp_name'][$i], $url);
                if(file_exists($url))
                {
                   $data3=["idProducto"=>$insert,"codigo"=>$codigoGeneral,"nombreImagen"=>$nombre_imagen,"url"=>$url,"visible"=>1];
                   $insert3=Producto_Operative::insert_productoimagen($data3);
                }
              }
              return 1;
            }
            else
            {
              return 0;
            }
          }
      }
      else
      {
        return "SINSESION";
      }
    }

  public function crear_producto($menu)
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

  public function listado_productos($menu)
  {
    if (Session::get('logeado')==true)
      {
      $id_empresa=Session::get('id_empresa');
      $data['titulo']='Listado de Productos';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['block_menu']=Session::get('skin');
      $data['menus_padres']="";
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      $data["productos"]=Producto_Operative::select_productos($id_empresa);
      return view('productos.listado_productos.index',$data);
      }else{
            //return View::make('login/login');
            return Redirect::to('/');
        }   
  }

  public function ficha_producto($id)
  {
    if (Session::get('logeado')==true)
      {
      $id_empresa=Session::get('id_empresa');
      $data['titulo']='Ficha de Producto';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['block_menu']=Session::get('skin');
      $data['menus_padres']="";
      $data['menus']="";
      $data["menus_hijos"]="";
      $data["producto"]=Producto_Operative::select_producto_xid($id);
      $data["imagenes"]=Producto_Operative::select_productoimagen($id);
      return view('productos.listado_productos.ficha_producto',$data);
      }else{
            //return View::make('login/login');
            return Redirect::to('/');
        }   
  }
}
