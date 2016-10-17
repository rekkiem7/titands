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
</section>
@include('footer')
<script>
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
                                var boton_editar='<button class="btn btn-primary" onclick="editar_usuario('+datos[i]["id"]+');"><i class="fa fa-pencil"></i></button>';
                                var boton_eliminar='<button class="btn btn-danger" onclick="eliminar_usuario('+datos[i]["id"]+');"><i class="fa fa-trash"></i></button>';
                                if(datos[i]["visible"]==1){datos[i]["visible"]='<i class="fa fa-check"></i>';}else{datos[i]["visible"]='<i class="fa fa-remove"></i>';}
                                var info=[datos[i]["id"],datos[i]["usuario"],datos[i]["nombre"],datos[i]["empresa"],datos[i]["sucursal"],datos[i]["departamento"],datos[i]["rol"],datos[i]["visible"],boton_ver,boton_editar,boton_eliminar];
                                array_final.push(info);
                            }
                            t.rows.add(array_final).draw();
                        }
                    }
                }
                /*
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
                */
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