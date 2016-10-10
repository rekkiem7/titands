@include('head')
<style>
    .centrado{
        text-align: center;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-info animated fadeIn">
                <div class="box-header with-border">
                    <h3 class="box-title">Registros</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="usuarios" class="table table-bordered table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th>Sucursal</th>
                                <th>Departamento</th>
                                <th>Rol</th>
                                <th>Visible</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mantenedores.Usuarios.ventana_ver_usuario')
    @include('mantenedores.Usuarios.ventana_editar_usuario')
</section>
@include('footer')
<script>
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
    function update_usuario()
    {
        var respuesta=validar_input();
        if(respuesta==0)
        {
            var inputFileImage = document.getElementById("editar_imagen");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append("archivo",file);
            data.append("id_usuario",$('#editar_id').val());
            data.append("nombre_usuario",$('#editar_usuario').val());
            data.append("password",$('#editar_password').val());
            data.append("empresa",$('#editar_empresa').val());
            data.append("sucursal",$('#editar_sucursal').val());
            data.append("departamento",$('#editar_departamento').val());
            data.append("rol",$('#editar_rol').val());
            data.append("visible",document.getElementById("editar_visible").checked);
            data.append("nombre1",$('#editar_primer_nombre').val());
            data.append("nombre2",$('#editar_segundo_nombre').val());
            data.append("apellido1",$('#editar_apellido_paterno').val());
            data.append("apellido2",$('#editar_apellido_materno').val());
            data.append("rut",$('#editar_rut').val());
            data.append("sexo",$('#editar_sexo').val());
            data.append("direccion",$('#editar_direccion').val());
            data.append("correo",$('#editar_correo').val());
            data.append("telefono",$('#editar_telefono').val());
            data.append("celular",$('#editar_celular').val());
            $.ajax({
                url: '{{url()}}/update_usuario',
                type: 'POST',
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                processData: false,
                cache: false,
                success: function (data) {
                    if(data=="SINSESION")
                    {
                        sinsesion();
                    }
                    else {
                        if (data == 0) {
                            swal("Error", "Se ha producido un problema al intentar editar el usuario, por favor inténtelo nuevamente", "error");
                        }
                    }
                }
            });
        }
        else{
            swal("Campos Faltantes", "Debe ingresar los datos faltantes", "info");
        }
    }
    function editar_usuario(id)
    {
        $.ajax({
            url: '{{url()}}/ver_editar_usuario',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id},
            success: function (data) {
                if(data=="SINSESION")
                {
                    sinsesion();
                }
                else{
                    if(data==0)
                    {
                        swal("Error", "Se ha producido un problema al intentar editar el usuario, por favor inténtelo nuevamente", "error");
                    }
                    else
                    {
                        var datos=JSON.parse(data);
                        $("#editar_empresa").find('option').remove();
                        $("#editar_sucursal").find('option').remove();
                        $("#editar_departamento").find('option').remove();
                        $("#editar_rol").find('option').remove();
                        $('#editar_usuario').val(datos["usuario"][0]["usuario"]);
                        $('#editar_password').val(datos["usuario"][0]["pass"]);
                        for(var i=0;i<datos["empresas"].length;i++) {
                            $("#editar_empresa").append('<option value="'+datos["empresas"][i]["id"]+'">'+datos["empresas"][i]["nombre"]+'</option>');
                        }
                        for(var i=0;i<datos["sucursales"].length;i++) {
                            $("#editar_sucursal").append('<option value="'+datos["sucursales"][i]["id"]+'">'+datos["sucursales"][i]["nombre"]+'</option>');
                        }
                        for(var i=0;i<datos["departamentos"].length;i++) {
                            $("#editar_departamento").append('<option value="'+datos["departamentos"][i]["id"]+'">'+datos["departamentos"][i]["nombre"]+'</option>');
                        }
                        for(var i=0;i<datos["roles"].length;i++) {
                            $("#editar_rol").append('<option value="'+datos["roles"][i]["id"]+'">'+datos["roles"][i]["nombre"]+'</option>');
                        }
                        $("#editar_empresa").val(datos["usuario"][0]["id_empresa"]);
                        $("#editar_sucursal").val(datos["usuario"][0]["id_sucursal"]);
                        $("#editar_departamento").val(datos["usuario"][0]["id_depto"]);
                        $("#editar_rol").val(datos["usuario"][0]["id_rol"]);
                        $("#editar_primer_nombre").val(datos["usuario"][0]["nombre1"]);
                        $("#editar_segundo_nombre").val(datos["usuario"][0]["nombre2"]);
                        $("#editar_apellido_paterno").val(datos["usuario"][0]["apellido_paterno"]);
                        $("#editar_apellido_materno").val(datos["usuario"][0]["apellido_materno"]);
                        $("#editar_rut").val(datos["usuario"][0]["rut"]);
                        $("#editar_sexo").val(datos["usuario"][0]["sexo"]);
                        $("#editar_direccion").val(datos["usuario"][0]["direccion"]);
                        $("#editar_correo").val(datos["usuario"][0]["correo"]);
                        $("#editar_telefono").val(datos["usuario"][0]["telefono"]);
                        $("#editar_celular").val(datos["usuario"][0]["celular"]);
                        if(datos["usuario"][0]["visible"]==1)
                        {
                            $("#editar_visible").bootstrapToggle('on');
                        }
                        else{
                            $("#editar_visible").bootstrapToggle('off');
                        }

                        if(datos["usuario"][0]["avatar"]=="" || datos["usuario"][0]["avatar"]===null)
                        {
                            datos["usuario"][0]["avatar"]=datos["usuario"][0]["imagen"];
                        }
                        var img='<img class="profile-user-img img-responsive img-circle" src="{{url()}}/'+datos["usuario"][0]["avatar"]+'" alt="User profile picture">';
                        $('#avatar_usuario_editar').html(img);
                        $('#ver_nombre_editar_usuario').html(datos["usuario"][0]["usuario"]);
                        $('#ver_id_editar').html(datos["usuario"][0]["id"]);
                        $('#editar_id').val(datos["usuario"][0]["id"]);
                        $('#ventana_editar_usuario').modal();
                    }
                }
            }
        });

    }
    function eliminar_usuario(id)
    {
        swal({   title: "¿Desea Eliminar el usuario N° "+id+" ?",   text: "El usuario desaparecerá del sistema",   type: "warning",   showCancelButton: true,cancelButtonText: "Cancelar",confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   closeOnConfirm: false },
                function() {
                    $.ajax({
                        url: '{{url()}}/delete_usuario',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id: id},
                        success: function (data) {
                            if (data == 1) {
                                swal("Usuario Eliminado", "El usuario N° "+id+" ha sido eliminado correctamente", "success");
                                setTimeout(function(){
                                    swal.close();
                                    cargar_usuarios();
                                }, 1500);
                            }
                            else {
                                if (data == "SINSESION") {
                                    sinsesion();
                                }
                                else {
                                    swal("Error", "No se ha producido un problema al eliminar un usuario, por favor inténtelo nuevamente", "error");
                                }
                            }
                        }
                    });
                });
    }
    function ver_usuario(id)
    {
        $.ajax({
            url: '{{url()}}/ver_usuario',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id},
            success: function (data) {
                if(data!=0)
                {
                    var datos=JSON.parse(data);
                    if(datos[0]["visible"]==1)
                    {
                        var notif_visible='<small class="label bg-green">Visible</small>';
                    }
                    else
                    {
                        var notif_visible='<small class="label bg-red">No Visible</small>';
                    }
                    $('#ver_id').html(datos[0]["iduser"] +'&nbsp;&nbsp;'+notif_visible);
                    $('#ver_nombre_usuario').html(datos[0]["usuario"]);
                    $('#ver_id2').html(datos[0]["iduser"] +'&nbsp;&nbsp;'+notif_visible);
                    $('#ver_nombre_usuario2').html(datos[0]["usuario"]);
                    if(datos[0]["avatar"]=="" || datos[0]["avatar"]===null)
                    {
                        datos[0]["avatar"]=datos[0]["imagen"];
                    }
                    var img='<img class="profile-user-img img-responsive img-circle" src="{{url()}}/'+datos[0]["avatar"]+'" alt="User profile picture">';
                    $("#avatar_usuario").html(img);
                    $("#avatar_usuario2").html(img);
                    var nombre_completo=datos[0]["nombre1"]+' '+datos[0]["nombre2"]+' '+datos[0]["apellido_paterno"]+' '+datos[0]["apellido_materno"];
                    $('#ver_nombre_completo').html(nombre_completo);
                    $('#ver_password').html(datos[0]["pass"]);
                    $('#ver_empresa').html(datos[0]["empresa"]);
                    $('#ver_sucursal').html(datos[0]["sucursal"]);
                    $('#ver_departamento').html(datos[0]["departamento"]);
                    $('#ver_rol').html(datos[0]["rol"]);
                    $('#ver_primer_nombre').html(datos[0]["nombre1"]);
                    $('#ver_segundo_nombre').html(datos[0]["nombre2"]);
                    $('#ver_apellido_paterno').html(datos[0]["apellido_paterno"]);
                    $('#ver_apellido_materno').html(datos[0]["apellido_materno"]);
                    $('#ver_rut').html(datos[0]["rut"]);
                    $('#ver_sexo').html(datos[0]["sexo"]);
                    $('#ver_direccion').html(datos[0]["direccion"]);
                    $('#ver_correo').html(datos[0]["correo"]);
                    $('#ver_telefono').html(datos[0]["telefono"]);
                    $('#ver_celular').html(datos[0]["celular"]);
                    $('#ver_usuario').modal();
                }
                else{

                }
            }
        });
    }
    function cargar_usuarios()
    {
        $.ajax({
            url: '{{url()}}/cargar_usuarios',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data)
            {
                if(data!=0) {
                    var t = $('#usuarios').DataTable();
                    t.clear().draw();
                    var datos = JSON.parse(data);
                    var array_final = new Array();
                    for (var i = 0; i < datos.length; i++) {
                        var boton_ver='<button class="btn btn-default" onclick="ver_usuario('+datos[i]["id"]+');"><i class="fa fa-search"></i></button>';
                        var boton_editar='<button class="btn btn-primary" onclick="editar_usuario('+datos[i]["id"]+');"><i class="fa fa-pencil"></i></button>';
                        var boton_eliminar='<button class="btn btn-danger" onclick="eliminar_usuario('+datos[i]["id"]+');"><i class="fa fa-trash"></i></button>';
                        if(datos[i]["visible"]==1){datos[i]["visible"]='<i class="fa fa-check"></i>';}else{datos[i]["visible"]='<i class="fa fa-remove"></i>';}
                        var info=[datos[i]["id"],datos[i]["usuario"],datos[i]["nombre"],datos[i]["empresa"],datos[i]["sucursal"],datos[i]["departamento"],datos[i]["rol"],datos[i]["visible"],boton_ver,boton_editar,boton_eliminar];
                        array_final.push(info);
                    }
                    t.rows.add(array_final).draw();
                }
                else {
                    swal("Sin Registros", "No se han encontrado registros de usuarios en el sistema", "info");
                }

            }
        });

    }

    function validarEmail( email ) {
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ( !expr.test(email) ) {
            $('#editar_correo').val('');
            $('#editar_correo').focus();
            swal("Email no válido", "El correo " + email + " no es correcto", "error");
        }
    }
    $(document).ready(function()
    {
        cargar_usuarios();
        $('#editar_empresa').change(function()
        {
            var id_emp=$('#editar_empresa').val();

            $("#editar_departamento").find('option').remove();
            $("#editar_rol").find('option').remove();
            $("#editar_sucursal").find('option').remove();
            $("#editar_sucursal").append('<option value="0">Seleccione una Sucursal...</option>');
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
                            for(var i=0;i<datos.length;i++)
                            {
                                $("#editar_sucursal").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                            }
                        }
                    }
                });
            }
        });

        $('#editar_sucursal').change(function()
        {
            var id_emp=$('#editar_empresa').val();
            var sucursal=$('#editar_sucursal').val();
            $("#editar_departamento").find('option').remove();
            $("#editar_rol").find('option').remove();
            $("#editar_departamento").append('<option value="0">Seleccione un Departamento...</option>');
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
                            for(var i=0;i<datos.length;i++)
                            {
                                $("#editar_departamento").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                            }

                        }
                    }
                });
            }
        });

        $('#editar_departamento').change(function()
        {
            var id_depto=$('#editar_departamento').val();
            $("#editar_rol").find('option').remove();
            $("#editar_rol").append('<option value="0">Seleccione un Rol...</option>');
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
                            for(var i=0;i<datos.length;i++)
                            {
                                $("#editar_rol").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                            }
                        }
                    }
                });
            }
        });
        $('#usuarios').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "columnDefs": [
                { className: "centrado", "targets": [ 1,4,5,6,7,8,9,10 ] }
            ],
            "language": {
                "search":"Buscar:",
                "lengthMenu": "Ver _MENU_ registros por página",
                "zeroRecords": "<center>No se encontraron registros</center>",
                "info": "_END_ de _TOTAL_ registros",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(Filtrados de _MAX_ total registros)",
                "paginate":{
                    "previous":"Anterior",
                    "next":"Siguiente"
                }
            },


        });
    });
</script>