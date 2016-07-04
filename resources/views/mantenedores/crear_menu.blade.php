@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Ingresar Menú</h3>
		    </div>
		    <div class="box-body">
	  		    	<label for="" class="col-lg-12 col-md-12 control-label">Nombre Menú</label>
	  		    	<div class="input-group col-lg-8 col-md-12">
	                  	<input type="text" id="nombre" name="nombre" class="form-control"/>
	                  	<span class="input-group-addon"><i class="fa fa-rocket"></i></span>
	            	</div><br>
	            	<label for="" class="col-lg-12 col-md-12 control-label">Menú Padre</label>	
	  		    	<div class="input-group col-lg-8">
	  		    		<input type="hidden" id="id_menu_padre" name="id_menu_padre" class="form-control" readonly/>
	                  	<input type="text" id="menu_padre" name="menu_padre" class="form-control" readonly/>
	                  	<span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
	            	</div>
            		<div class="input-group col-lg-4">
	            	<button class="btn btn-primary" onclick="menu_BuscarPadre()"><i class="fa fa-search"></i>Buscar</button>
	            	</div><br>
	            	<label for="" class="col-lg-12 col-md-12 control-label">URL</label>	
	  		    	<div class="input-group col-lg-8">
	                  	<input type="text" id="url" name="url" class="form-control" onblur="verificar_url();"/>
	                  	<span class="input-group-addon"><i class="fa fa-globe"></i></span>
	            	</div> 
	            	<label for="" class="col-lg-12 col-md-12 control-label">Icono</label>	
	  		    	<div class="input-group col-lg-8">
	                  	<input type="text" id="icono" name="icono" class="form-control" />
	                  	<span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
	            	</div> <br>
	            	<div class="col-lg-8">
						<button class="btn btn-success" onclick="Guardar_Menu()"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar Menú</button>	            		
	            	</div>   	
		    </div>
		</div>
	  </div>
   </div>
</section>
@include('mantenedores.ventana_BuscarMenuPadre')
<script>
function Guardar_Menu()
{
	var nombre=$('#nombre').val();
	var id_padre=$('#id_menu_padre').val();
	var url=$('#url').val();
	var icono=$('#icono').val();
	if(nombre=='')
	{
		swal("Nombre Faltante","Debe ingresar el nombre del menú", "info");
	}
	else
	{
		if(id_padre=='')
		{
			swal("Campo Padre Menú Faltante","Debe indicar si el menú es padre o tiene un menú padre asociado", "info");
		}
		else
		{
			if(url=='')
			{
				swal("Url Faltante","Debe ingresar la url del menú", "info");
			}
			else
			{
				if(icono=='')
				{
					swal("Icono Faltante","Debe ingresar el icono del menú", "info");
				}
				else
				{
					$.ajax({
				        url: '{{url()}}/add_menu',
				        type: 'POST',
				        headers: {
				          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
				        data:{nombre:nombre,id_padre:id_padre,url:url,icono:icono},
				        success:function(data)
				        {
				        	if(data==0)
				        	{
				        		swal("Error de Almacenamiento","Se ha producido un error al registrar el nuevo menú, por favor ingresar nuevamente ", "error");
				        	}
				        	else
				        	{
				        		if(data=='SINSESION')
			            		{
			            			sinsesion();
			            		}
			            		else
			            		{
			            			swal("Menú Guardado","El menú ingresado a sido registrado exitosamente", "success");
			            		}
				        	}
				        }
				    });
				}
			}
		}
	}
}

function menu_BuscarPadre()
{
	$('#BuscarMenuPadre').modal();
}

function verificar_url()
{
	var url=$('#url').val();
	if(url!='')
	{
		$.ajax({
	        url: '{{url()}}/verificar_url',
	        type: 'POST',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data:{url:url},
	        success:function(data)
	        {
	        	if(data==0)
	        	{
	        		swal("URL Existente", "Estimado(a), la url ya existe en nuestros registros, por favor ingrese una URL diferente", "error");
	        		$('#url').val('');
	        		$('#url').focus();
	        	}
	        }
	    });
	}
}

</script>
@include('footer')