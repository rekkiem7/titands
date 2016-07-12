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

            $count = count($_FILES['archivos']['name']);
            for ($i = 0; $i < $count; $i++) {
                echo $_FILES['archivos']['name'][$i].'<br/>';
            }
          }
      }
      else
      {
        return "SINSESION";
      }
    } 
}
