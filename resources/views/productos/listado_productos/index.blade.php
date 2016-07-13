@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Productos</h3>
		    </div>
		    <div class="box-body">
		    	<table id="productos" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th style="text-align:center">Ver</th>
                  <th style="text-align:center">Editar</th>
                  <th style="text-align:center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $row)
                <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->codigo}}</td>
                <td>{{$row->nombre}}</td>
                <td style="text-align:center"><button class="btn btn-info" onclick="ver_producto({{$row->id}});"><i class="fa fa-eye"></i></button></td>
                <td style="text-align:center"><button class="btn btn-primary" onclick=""><i class="fa fa-edit"></i></button></td>
                <td style="text-align:center"><button class="btn btn-danger" onclick=""> <i class="fa fa-remove"></i></button></td>
                @endforeach
                </tbody>
              </table>
		    </div>
		</div>
	  </div>
   </div>
</section>
<script>
function ver_producto(id)
{
	window.open('{{URL::to("ficha_producto")}}/'+id,'_blank');
}
$(document).ready(function()
{
  $('#productos').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
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
@include('footer')