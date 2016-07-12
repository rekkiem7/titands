@include('head')
<style>
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}

.kv-file-upload{
display:none;
}

.kv-file-zoom{
display:none;
}
 
</style>
<section class="content">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Formulario de Creación</h3>
		    </div>
		    <div class="box-body">
		    	<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active TitanTab" id="TabdatosGenerales" ><a id="AdatosGenerales" href="#datosGenerales" data-toggle="tab">&nbsp;&nbsp;Datos Generales</a></li>
		              <li id="Tabrestricciones"><a id="Arestricciones" href="#restricciones" data-toggle="tab">&nbsp;&nbsp;Restricciones</a></li>
		              <li id="Tabdescripcion"><a id="Adescripcion" href="#descripcion" data-toggle="tab">&nbsp;&nbsp;Descripción</a></li>
		              <li id="TabdatosLogisticos"><a id="AdatosLogisticos" href="#datosLogisticos" data-toggle="tab"></i>&nbsp;&nbsp;Datos Logísticos</a></li> 
		              <li id="TabdatosEmpaquetado"><a id="AdatosEmpaquetado" href="#datosEmpaquetado" data-toggle="tab">&nbsp;&nbsp;Datos de Empaquetado</a></li>
		              <li id="TabdatosImagen"><a id="AdatosImagen" href="#datosImagen" data-toggle="tab">&nbsp;&nbsp;Imágenes</a></li>            
		            </ul> 
            		<div class="tab-content">
		              <div class="active tab-pane animated fadeIn" id="datosGenerales">
		              	@include('productos.ficha_producto.datos_generales')
	
		            	</div>
		            	<div id="tipo_2" style="display:none" class="animated fadeIn">
		            		tipo 2
		            	</div>
		            	<div id="tipo_3" style="display:none" class="animated fadeIn">
		            		tipo 3
		            	</div>
		              </div>
		              <!-- /.tab-pane -->
		              <div class="tab-pane animated fadeIn" id="restricciones">
		                @include('productos.ficha_producto.restricciones')
		              </div>
              		  <!-- /.tab-pane -->
              		  <div class="tab-pane animated fadeIn" id="descripcion">
              		  	 @include('productos.ficha_producto.descripcion')
                	  </div>
                	  <div class="tab-pane animated fadeIn" id="datosLogisticos">
                	  	 @include('productos.ficha_producto.datos_logisticos')
                	  </div>
                	  <div class="tab-pane animated fadeIn" id="datosEmpaquetado">
                	  	 @include('productos.ficha_producto.datos_empaquetado')
                	  </div>
                	  <div class="tab-pane animated fadeIn" id="datosImagen">
                	  	 @include('productos.ficha_producto.datos_imagen')
                	  </div>
              		  <!-- /.tab-pane -->
                    </div>
            		  <!-- /.tab-content -->
         		</div>
		    </div>
            <!-- /.box-body -->
        </div>
      </div>
    </div>
</section>
<script>
function tomar_datos()
{
	var tipo=$('#tipo').val();
	if(tipo==1)
	{
		var familia=$('#familia').val();
		var categoria=$('#categoria').val();
		var nombre=$('#nombre').val();
		var codigoGeneral=$('#codigoGeneral').val();
		var unidadMedida=$('#unidadMedida').val();
		var precioVenta=$('#precioVenta').val();
		var cantidadMinimaVenta=$('#cantidadMinimaVenta').val();
		var unidadCantidadMinimaVenta=$('#unidadCantidadMinimaVenta').val();
		var precioPorMayor=$('#precioPorMayor').val();
		var cantidadMinimaPorMayor=$('#cantidadMinimaPorMayor').val();
		var visible=document.getElementById("visible").checked;
		var disponiblePedidos=document.getElementById("disponiblePedidos").checked;
		var mostrarPrecio=document.getElementById("mostrarPrecio").checked;
		var disponibleOnline=document.getElementById("disponibleOnline").checked;
		var descripcionProducto=CKEDITOR.instances['descripcionProducto'].getData();
		var anchoProducto=$('#anchoProducto').val();
		var unidadAnchoProducto=$('#unidadAnchoProducto').val();
		var altoProducto=$('#altoProducto').val();
		var unidadAltoProducto=$('#unidadAltoProducto').val();
		var profundidadProducto=$('#profundidadProducto').val();
		var unidadProfundidadProducto=$('#unidadProfundidadProducto').val();
		var pesoProducto=$('#pesoProducto').val();
		var unidadPesoProducto=$('#unidadPesoProducto').val();
		var cantidadEmpaque=$('#cantidadEmpaque').val();
		var unidadCantidadEmpaque=$('#unidadCantidadEmpaque').val();
		var anchoEmpaque=$('#anchoEmpaque').val();
		var unidadAnchoEmpaque=$('#unidadAnchoEmpaque').val();
		var altoEmpaque=$('#altoEmpaque').val();
		var unidadAltoEmpaque=$('#unidadAltoEmpaque').val();
		var profundidadEmpaque=$('#profundidadEmpaque').val();
		var unidadProfundidadEmpaque=$('#unidadProfundidadEmpaque').val();
		var pesoEmpaque=$('#pesoEmpaque').val();
		var unidadPesoEmpaque=$('#unidadPesoEmpaque').val();
		var files = document.getElementById("imagenesProducto").files;
		var data=new FormData();
		for (var i = 0; i < files.length; i++)
		{
		   data.append("archivos[]",document.getElementById('imagenesProducto').files[i]);
		}
		data.append("tipo",tipo);
		data.append("familia",familia);
		data.append("categoria",categoria);
		data.append("nombre",nombre);
		data.append("codigoGeneral",codigoGeneral);
		data.append("unidadMedida",unidadMedida);
		data.append("precioVenta",precioVenta);
		data.append("cantidadMinimaVenta",cantidadMinimaVenta);
		data.append("unidadCantidadMinimaVenta",unidadCantidadMinimaVenta);
		data.append("precioPorMayor",precioPorMayor);
		data.append("cantidadMinimaPorMayor",cantidadMinimaPorMayor);
		data.append("visible",visible);
		data.append("disponiblePedidos",disponiblePedidos);
		data.append("mostrarPrecio",mostrarPrecio);
		data.append("disponibleOnline",disponibleOnline);
		data.append("descripcionProducto",descripcionProducto);
		data.append("anchoProducto",anchoProducto);
		data.append("unidadAnchoProducto",unidadAnchoProducto);
		data.append("altoProducto",altoProducto);
		data.append("unidadAltoProducto",unidadAltoProducto);
		data.append("profundidadProducto",profundidadProducto);
		data.append("unidadProfundidadProducto",unidadProfundidadProducto);
		data.append("pesoProducto",pesoProducto);
		data.append("unidadPesoProducto",unidadPesoProducto);
		data.append("cantidadEmpaque",cantidadEmpaque);
		data.append("unidadCantidadEmpaque",unidadCantidadEmpaque);
		data.append("anchoEmpaque",anchoEmpaque);
		data.append("unidadAnchoEmpaque",unidadAnchoEmpaque);
		data.append("altoEmpaque",altoEmpaque);
		data.append("unidadAltoEmpaque",unidadAltoEmpaque);
		data.append("profundidadEmpaque",profundidadEmpaque);
		data.append("unidadProfundidadEmpaque",unidadProfundidadEmpaque);
		data.append("pesoEmpaque",pesoEmpaque);
		data.append("unidadPesoEmpaque",unidadPesoEmpaque);		
	}

	return data;
}
function productos_updateLabel()
{
    var texto=$('#unidadMedida option:selected').text();
    $('#abrev').empty();
    $('#abrev').append('/'+texto+')');
    var unidad=$('#unidadMedida').val();
    $('#unidadCantidadMinimaVenta').val(unidad);
    $('#unidadCantidadEmpaque').val(unidad);
    $('#unidadCantidadMinimaVenta').attr('disabled',true);
    $('#unidadCantidadEmpaque').attr('disabled',true);
}
function productos_selectTipoProducto()
{
	var tipo=$('#tipo').val();
	if(tipo==1)
	{
		$('#tipo_1').attr('style','display:');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:none');
	}

	if(tipo==2)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:');
		$('#tipo_3').attr('style','display:none');
	}

	if(tipo==3)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:');
	}

	if(tipo==0)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:none');
	}

}

function Direccionar(DondeDireccionar)
{
    // ACTIVA EL TAB SEGUN EL ID ANCHOR
	$('#A'+DondeDireccionar).click();
    // QUITA TODOS LOS CLASS ACTIVES DE LOS TAB
    $('.TitanTab').each(function() {
        $(this).removeClass("active");
    });      
    // ACTIVA EL TAB SELECCIONADO
    $("#Tab"+DondeDireccionar).addClass("active"); 
    // VUELVE AL INICIO DE LA PAGINA
    $('html, body').animate({scrollTop:0}, 'slow');
}

$(document).ready(function()
{

$('#datepicker').datepicker({
      autoclose: true
    });

$('#familia').change(function()
{
	var familia=$('#familia').val();
	$('#categoria').empty();
	if(familia>0)
	{

		$.ajax({
            url: '{{url()}}/get_categorias',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{familia:familia},
            success:function(data)
            {
            	if(data==0)
            	{
            		swal("Error", "No existen categorias asociadas a la familia seleccionada", "error");
            	}
            	else
            	{
            		if(data=='SINSESION')
            		{
            			sinsesion();
            		}
            		else
            		{
            			var datos=JSON.parse(data);
            			$('#categoria').append('<option value="0">Seleccione la categoria</option>');
            			for(var i=0;i<datos.length;i++)
            			{
            				$('#categoria').append('<option value="'+datos[i]['id']+'">'+datos[i]['nombre']+'</option>');
            			}
            		}
            	}
            }
        });
	}
});

	$('#guardarProducto').click(function()
	{
		 var tipo=$('#tipo').val();
		 if(tipo==0)
		 {
		 	swal("Campo Faltante", "Debe seleccionar el tipo de producto", "info");
		 	$('#tipo').focus();
		 }
		 else
		 {
			 if(tipo==1)
			 {
			 	if($('#familia').val()==0)
			 	{
			 		swal("Campo Faltante", "Debe seleccionar la familia del producto", "info");
			 	}
			 	else
			 	{
			 		if($('#categoria').val()==0)
			 		{
			 			swal("Campo Faltante", "Debe seleccionar la categoria del producto", "info");
			 		}
			 		else
			 		{
			 			if($('#unidadMedida').val()==0)
			 			{
			 				swal("Campo Faltante", "Debe seleccionar la unidad de medida del producto", "info");
			 			}
			 			else
			 			{
			 				var validar=productos_validar();
							 if(validar!=0)
							 {
							 	var data=tomar_datos();
							 	alert(data);
							 	$.ajax({
						            url: '{{url()}}/add_producto',
						            type: 'POST',
						            contentType:false,
						            data:data,
						            processData:false,
						            cache:false,
						            headers: {
						              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						            },
						            success:function(data)
						            {

						            }
						        });
							 }
			 			}
			 		}
			 	}
				 
			 }
		 }
	});
});

function productos_validar()
{	
	var error=0;
	$('.requerido').each(function(i, elem) {

		if($(elem).val() == ''){
			$(elem).css({'border':'1px solid #CC0000'});
			error++;
			}
		else
		{
			$(elem).css({'border':''});
		}
	});

	if(error > 0){
		//event.preventDefault();
		swal("Campos Faltantes", "Debe ingresar los datos faltantes", "info");
		return 0;
		}
	else
	{
		return 1;
	}
	
}
</script>
@include('footer')
