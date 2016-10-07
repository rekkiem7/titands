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
                                <td>Usuario</td>
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
</section>
@include('footer')
<script>
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
                    $('#ver_id').html(datos[0]["iduser"]);
                    $('#ver_nombre_usuario').html(datos[0]["usuario"]);
                    if(datos[0]["avatar"]=="" || datos[0]["avatar"]===null)
                    {
                        datos[0]["avatar"]=datos[0]["imagen"];
                    }
                    var img='<img class="profile-user-img img-responsive img-circle" src="{{url()}}/'+datos[0]["avatar"]+'" alt="User profile picture">';
                    $("#avatar_usuario").html(img);
                    var nombre_completo=datos[0]["nombre1"]+' '+datos[0]["nombre2"]+' '+datos[0]["apellido_paterno"]+' '+datos[0]["apellido_materno"];
                    $('#ver_nombre_completo').html(nombre_completo);
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
    $(document).ready(function()
    {
        cargar_usuarios();
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