@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
			<div class="box-header with-border">
		        <h3 class="box-title">Agregar Usuario</h3>
		    </div>
		    <div class="box-body">
		    	<div class="nav-tabs-custom">
			    	<div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			            	<li class="active general" id="Tabgeneral" ><a id="Ageneral" href="#general" data-toggle="tab">General</a></li>
			            	<li id="Tabdetalle"><a id="Adetalle" href="#detalle" data-toggle="tab">Detalle</a></li>
			            </ul>

			            <div class="tab-content">
		              		<div class="active tab-pane animated fadeIn TitanTab" id="general">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Usuario</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="usuario" name="usuario"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Contraseña</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="password" class="form-control requerido" id="password" name="password"/>
		              				<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Empresa</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control requerido" id="empresa" name="empresa">
				                  	<option value="0">Seleccione una empresa...</option>
				                      @foreach($empresas as $row_empresa)
				                      <option value="{{$row_empresa->id}}">{{$row_empresa->nombre}}</option>
				                      @endforeach
				                      
				                    </select>
		              				<span class="input-group-addon"><i class="fa fa-bank"></i></span>
		              			</div><br>
		              			<div id="input-sucursal" style="display:none">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Sucursal</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control" id="sucursal" name="sucursal">
                    				</select>
		              				<span class="input-group-addon"><i class="fa fa-building"></i></span>
		              			</div><br>
		              			</div>
		              			<div id="input-depto" style="display:none">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Departamento</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control" id="depto" name="depto">
                    				</select>
		              				<span class="input-group-addon"><i class="fa fa-building"></i></span>
		              			</div><br>
		              			</div>
		              			<div id="input-rol" style="display:none">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Rol</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control" id="rol" name="rol">
                    				</select>
		              				<span class="input-group-addon"><i class="fa fa-flag"></i></span>
		              			</div><br>
		              			</div>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Visible</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="checkbox" checked data-toggle="toggle" id="visible" name="visible" class="requerido">
		              			</div><br>
		              			<div class="col-lg-8 col-md-8 col-sm-12">
									<button onclick="Direccionar('detalle');" type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
								</div><br><br>

		              		</div>

		              		<div class="tab-pane animated fadeIn" id="detalle">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Primer Nombre</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="primer_nombre" name="primer_nombre"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Segundo Nombre</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="segundo_nombre" name="segundo_nombre"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Apellido Paterno</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="apellido_paterno" name="apellido_materno"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Apellido Materno</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="apellido_materno" name="apellido_materno"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Sexo</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control requerido" id="sexo" name="sexo">
		              					<option value="0">Seleccione sexo...</option>
		              					<option value="1">Masculino</option>
		              					<option value="2">Femenino</option> 
		              			    </select>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>

		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Dirección</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="direccion" name="direccion"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Correo</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="correo" name="correo"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Teléfono</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="telefono" name="telefono"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Celular</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="celular" name="celular"/>
		              				<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              			</div><br>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
									<button class="btn btn-success" id="guardarUsuario" name="guardarUsuario" >Guardar  <i class="glyphicon glyphicon-floppy-disk"></i></button><br><br>
								</div>
		              		</div>
		              	</div>
			        </div>
		    	</div>
		    </div>
		</div>
	  </div>
   </div>
</section>
<script>
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
$(document).ready(function(){
	$('#empresa').change(function()
  {
    var id_emp=$('#empresa').val();
    $('#input-depto').slideUp();
    $('#input-rol').slideUp();
    $('#input-sucursal').slideUp();
    $("#depto").find('option').remove();
    $("#rol").find('option').remove();
    $("#sucursal").find('option').remove();
    if(id_emp>0)
    {
      $.ajax({
            url: '{{url()}}/get_sucursal',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{empresa:id_emp},
            success:function(data)
            {
              if(data!=0)
              {
                var datos=JSON.parse(data);
                $("#sucursal").append('<option value="0">Seleccione una Sucursal...</option>');
                for(var i=0;i<datos.length;i++)
                { 
                $("#sucursal").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-sucursal').slideDown();

               /* $("#depto").append('<option value="0">Seleccione un Departamento...</option>');
                for(var i=0;i<datos.length;i++)
                { 
                $("#depto").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-depto').slideDown();*/
              }
              else
              {

              }
            }
          });
    }
  });

  $('#sucursal').change(function()
  {
    var id_emp=$('#empresa').val();
    var sucursal=$('#sucursal').val();
    $('#input-rol').slideUp();
    $('#input-depto').slideUp();
    $("#depto").find('option').remove();
    $("#rol").find('option').remove();
    if(sucursal>0)
    {
      $.ajax({
            url: '{{url()}}/get_departamentos',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{empresa:id_emp,sucursal:sucursal},
            success:function(data)
            {
              if(data!=0)
              {
                var datos=JSON.parse(data);
                $("#depto").append('<option value="0">Seleccione un Departamento...</option>');
                for(var i=0;i<datos.length;i++)
                { 
                $("#depto").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-depto').slideDown();
              }
              else
              {

              }
            }
          });
    }
  });

  $('#depto').change(function()
  {
    var id_depto=$('#depto').val();
    $('#input-rol').slideUp();
    $("#rol").find('option').remove();
    if(id_depto>0)
    {
      $.ajax({
            url: '{{url()}}/get_roles',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{dpto:id_depto},
            success:function(data)
            {
              if(data!=0)
              {
                var datos=JSON.parse(data);
                
                $("#rol").append('<option value="0">Seleccione un Rol...</option>');
                for(var i=0;i<datos.length;i++)
                { 
                $("#rol").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-rol').slideDown();
              }
              else
              {

              }
            }
          });
    }
  });
});
</script>
@include('footer')