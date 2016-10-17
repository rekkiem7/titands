@include('head')
<style>

</style>
<section class="content">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="box box-info animated fadeInRight">
                <div class="box-header with-border">
                    <h3 class="box-title">Buscar Usuario</h3>
                </div>
                <div class="box-body">
                    <div id="input-empresa">
                        <label for="" class="col-lg-2 col-md-12 control-label">Empresa</label>
                        <div class="input-group col-lg-10 col-md-12">

                            <select class="form-control" id="empresa" name="empresa">
                                <option value="0">Seleccione una empresa...</option>
                                @foreach($empresas as $row_empresa)
                                <option value="{{$row_empresa->id}}">{{$row_empresa->nombre}}</option>
                                @endforeach

                            </select>
                            <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                        </div>
                    </div><br>
                    <div id="input-sucursal" style="display:none">
                        <label for="" class="col-lg-2 col-md-12 control-label">Sucursal</label>
                        <div class="input-group col-lg-10 col-md-12">

                            <select class="form-control" id="sucursal" name="sucursal">
                            </select>
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        </div>
                    </div><br>
                    <div id="input-depto" style="display:none">
                        <label for="" class="col-lg-2 col-md-12 control-label">Departamento</label>
                        <div class="input-group col-lg-10 col-md-12">

                            <select class="form-control" id="depto" name="depto">
                            </select>
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        </div>
                    </div><br>
                    <div id="input-rol" style="display:none">
                        <label for="" class="col-lg-2 col-md-12 control-label">Rol</label>
                        <div class="input-group col-lg-10 col-md-12">

                            <select class="form-control" id="rol" name="rol">
                            </select>
                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        </div>
                    </div><br>
                </div></div><br>
        </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-info animated fadeInRight">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado</h3>
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
                                <th>Ingresar</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
    </div>
    <div style="display:none">
    <form action="{{ URL::to('login') }}" method="post" role="form" id="form" name="form">
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" id="usuario" name="usuario">
            <span class="glyphicon  glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="clave" name="clave">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4>
                <i class="icon fa fa-ban"></i>
                Datos Incorrectos
            </h4>
            {{ Session::get('error') }}
        </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    </form>
    </div>
    @include('mantenedores.Usuarios.ventana_ver_usuario')
</section>
@include('footer')
<script>
    function ingresar_como(id,usuario,pass)
    {

        swal({   title: "¿Desea Ingresar como el usuario N°"+id+" ?",
                 text: "Su sesión actual se eliminará, procure guardar todos sus cambios.",
                 type: "info",
                 showCancelButton: true,
                 cancelButtonText: "Cancelar",
                 confirmButtonColor: "#5cb85c",
                 confirmButtonText: "Ingresar",
                 closeOnConfirm: true },
                 function(){
                    $('#usuario').val(usuario);
                     $('#clave').val(pass);
                     $('#form').submit();
                 });
    }

    function cargar_usuarios()
    {
        var empresa=$('#empresa').val();
        var sucursal=$('#sucursal').val();
        var id_depto=$('#depto').val();
        var rol=$('#rol').val();

        $.ajax({
            url: '{{url()}}/cargar_usuarios_xfiltro',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{empresa:empresa,sucursal:sucursal,depto:id_depto,rol:rol},
            success:function(data)
            {
                if(data["result"]==2)
                {
                    sinsesion();
                }
                else {
                    if(data["result"]==0)
                    {
                        var t = $('#usuarios').DataTable();
                        t.clear().draw();
                        swal(data["titulo"], data["error"], "info");
                    }
                    else
                    {
                        if(data["result"]==1)
                        {
                            var t = $('#usuarios').DataTable();
                            t.clear().draw();
                            var datos = JSON.parse(data["data"]);
                            var array_final = new Array();
                            for (var i = 0; i < datos.length; i++) {
                                var boton_ver='<button class="btn btn-default" onclick="ver_usuario('+datos[i]["id"]+');"><i class="fa fa-search"></i></button>';
                                var boton_ingresar='<button class="btn btn-primary" onclick="ingresar_como('+datos[i]["id"]+',\''+datos[i]["usuario"]+'\',\''+datos[i]["pass"]+'\');"><i class="fa fa-key"></i></button>';
                                if(datos[i]["visible"]==1){datos[i]["visible"]='<i class="fa fa-check"></i>';}else{datos[i]["visible"]='<i class="fa fa-remove"></i>';}
                                var info=[datos[i]["id"],datos[i]["usuario"],datos[i]["nombre"],datos[i]["empresa"],datos[i]["sucursal"],datos[i]["departamento"],datos[i]["rol"],datos[i]["visible"],boton_ver,boton_ingresar];
                                array_final.push(info);
                            }
                            t.rows.add(array_final).draw();
                        }
                    }
                }
            }
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

    $(document).ready(function()
    {

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

                            cargar_usuarios();
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
                            cargar_usuarios();
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
                            cargar_usuarios();
                        }
                        else
                        {

                        }
                    }
                });
            }
        });

        $('#rol').change(function()
        {
            cargar_usuarios();
        });

        $('#usuarios').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "columnDefs": [
                { className: "centrado", "targets": [ 1,4,5,6,7,8,9 ] }
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