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
			            	<li class="active" id="Tabgeneral" ><a id="Ageneral" href="#general" data-toggle="tab">General</a></li>
			            	<li id="Tabdetalle"><a id="Adetalle" href="#detalle" data-toggle="tab">Detalle</a></li>
							<li id="Tabavatar"><a id="Aavatar" href="#avatar" data-toggle="tab">Foto de Perfil</a></li>
			            </ul>
			            <div class="tab-content">
		              		<div class="active tab-pane animated fadeIn TitanTab" id="general">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Usuario</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="usuario" name="usuario" onblur="verificar_usuario();"/>
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
		              				<select class="form-control requerido" id="sucursal" name="sucursal">
                    				</select>
		              				<span class="input-group-addon"><i class="fa fa-building"></i></span>
		              			</div><br>
		              			</div>
		              			<div id="input-depto" style="display:none">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Departamento</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control requerido" id="depto" name="depto">
                    				</select>
		              				<span class="input-group-addon"><i class="fa fa-building"></i></span>
		              			</div><br>
		              			</div>
		              			<div id="input-rol" style="display:none">
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Rol</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control requerido" id="rol" name="rol">
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
		              				<span class="input-group-addon"><i class="fa fa-child"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Segundo Nombre</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"/>
		              				<span class="input-group-addon"><i class="fa fa-male"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Apellido Paterno</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control requerido" id="apellido_paterno" name="apellido_paterno"/>
		              				<span class="input-group-addon"><i class="fa fa-file-word-o"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Apellido Materno</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control" id="apellido_materno" name="apellido_materno"/>
		              				<span class="input-group-addon"><i class="fa fa-file-word-o"></i></span>
		              			</div><br>
								<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">R.U.T</label>
								<div class="input-group col-lg-5 col-md-5 col-sm-12">
									<input type="text" class="form-control requerido" id="rut" name="rut"/>
									<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
								</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Sexo</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<select class="form-control requerido" id="sexo" name="sexo">
		              					<option value="0">Seleccione sexo...</option>
		              					<option value="Masculino">Masculino</option>
		              					<option value="Femenino">Femenino</option>
		              			    </select>
		              				<span class="input-group-addon"><i class="fa fa-flag"></i></span>
		              			</div><br>

		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Dirección</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control " id="direccion" name="direccion"/>
		              				<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Correo</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control" id="correo" name="correo" onblur="validar_correo();"/>
		              				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Teléfono</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control" id="telefono" name="telefono"/>
		              				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
		              			</div><br>
		              			<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Celular</label>
		              			<div class="input-group col-lg-5 col-md-5 col-sm-12">
		              				<input type="text" class="form-control" id="celular" name="celular"/>
		              				<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
		              			</div><br>
								<div class="col-lg-8 col-md-8 col-sm-12">
									<button onclick="Direccionar('avatar');" type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
								</div><br><br>

		              		</div>
							<div class="tab-pane animated fadeIn" id="avatar">
								<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Imágen del Usuario</label>
								<div class="input-group col-lg-12 col-md-12 col-sm-12">
									<form enctype="multipart/form-data">
										<input id="imagen" name="imagen" class="file" type="file" >
									</form>
									<script>
										$('#imagen').fileinput({
											language: 'es',
											showUpload:false,
											allowedFileExtensions : ['jpg', 'png','gif']
										});
									</script>
								</div><br>
								<div class="input-group col-lg-5 col-md-5 col-sm-12">
									<button class="btn btn-success" id="guardarUsuario" name="guardarUsuario" onclick="guardarUsuario();">Guardar  <i class="glyphicon glyphicon-floppy-disk"></i></button><br><br>
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
@include('footer')
<script>
function verificar_usuario()
{
	var usuario=$('#usuario').val();
	if(usuario!='' || usuario.length>0)
	{
		$.ajax({
			url: '{{url()}}/verificar_disponibilidad_nombre_usuario',
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {usuario: usuario},
			success: function (data) {
				if(data==0)
				{
					$('#usuario').val("");
					$('#usuario').focus();
					swal("Nombre de Usuario existente", "Estimado(a) usuario(a), el nombre de usuario ingresado ya se encuentra en uso, por favor, inténte con otro nombre", "info");
				}
				else
				{
					if(data=="SINSESION")
					{
						sinsesion();
					}
				}
			}
		});
	}
}
function validar_input(){

	var error=0;
	$('.requerido').each(function(i, elem)
	{
		var valor=$(this).val();
		if($(elem).val()=='' || $(elem).val()==0)
		{
			$(elem).css({'border':'1px solid #CC0000'});
			error++;
		}
		else
		{
			$(elem).css({'border':''});
		}
	});
	return error;
}
function guardarUsuario()
{
	var respuesta=validar_input();
	if(respuesta==0)
	{
		var nombre_usuario=$('#usuario').val();
		var password=$('#password').val();
		var empresa=$('#empresa').val();
		var sucursal=$('#sucursal').val();
		var departamento=$('#depto').val();
		var rol=$('#rol').val();
		var visible=document.getElementById("visible").checked;
		var primer_nombre=$("#primer_nombre").val();
		var segundo_nombre=$('#segundo_nombre').val();
		var apellido_paterno=$('#apellido_paterno').val();
		var apellido_materno=$('#apellido_materno').val();
		var rut=$('#rut').val();
		var sexo=$('#sexo').val();
		var direccion=$('#direccion').val();
		var correo=$('#correo').val();
		var telefono=$('#telefono').val();
		var celular=$('#celular').val();

		var inputFileImage = document.getElementById("imagen");
		var file = inputFileImage.files[0];
		var data = new FormData();
		data.append("archivo",file);
		data.append("nombre_usuario",nombre_usuario);
		data.append("password",password);
		data.append("empresa",empresa);
		data.append("sucursal",sucursal);
		data.append("departamento",departamento);
		data.append("rol",rol);
		data.append("visible",visible);
		data.append("primer_nombre",primer_nombre);
		data.append("segundo_nombre",segundo_nombre);
		data.append("apellido_paterno",apellido_paterno);
		data.append("apellido_materno",apellido_materno);
		data.append("rut",rut);
		data.append("sexo",sexo);
		data.append("direccion",direccion);
		data.append("correo",correo);
		data.append("telefono",telefono);
		data.append("celular",celular);
		$.ajax({
			url: '{{url()}}/add_usuario',
			type: 'POST',
			contentType:false,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: data,
			processData:false,
			cache:false,
			success: function (data) {
				if(data==1)
				{
						swal("Usuario Guardado", "El usuario ha sido registrado correctamente", "success");
					setTimeout(function(){ window.open("{{URL::to('crear_usuario/'.$menu)}}","_self") }, 1500);
				}
				else {
					if (data == 0) {
						swal("Error", "Se a producido un problema al guardar el usuario, por favor, inténtelo nuevamente", "error");
					}
					else
					{
						if(data==2)
						{
							swal("Error", "Se a producido un problema al guardar el detalle del usuario.", "error");
						}
						else {
							if(data=="SINSESION")
							{
								sinsesion();
							}
							else {
								if(data=="PROBLEMASIMAGEN")
								{
									swal("Error", "Se a producido un problema al almacenar la imagen de perfil.", "error");
								}
							}
						}
					}
				}
			}
		});
	}
	else{
		swal("Campos Faltantes", "Debe ingresar los datos faltantes", "info");
	}
}
function validar_correo()
{
	var email=$('#correo').val();
	if(email!='')
	{
	validarEmail(email);
	}
}

function validarEmail( email ) {
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ( !expr.test(email) ) {
			$('#correo').val('');
			$('#correo').focus();
			swal("Email no válido", "El correo " + email + " no es correcto", "error");
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

$(document).ready(function(){
	$('#rut').Rut();
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
