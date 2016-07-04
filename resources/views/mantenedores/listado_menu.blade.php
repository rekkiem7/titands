@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
			<div class="box-header with-border">
		        <h3 class="box-title">Menus</h3>
		    </div>
		    <div class="box-body">
		    	<table id="menus" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Menú</th>
                  <th>Menú Padre</th>
                  <th style="text-align:center">Editar</th>
                  <th style="text-align:center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_menus as $row)
                <tr><td style="text-align:center">{{$row->id}}</td><td>{{$row->nombre}}</td><td>{{$row->nombre_padre}}</td><td style="text-align:center"><button class="btn btn-primary"> <i class="fa fa-edit"></i></button></td><td style="text-align:center"><button class="btn btn-danger"> <i class="fa fa-remove"></i></button></td></tr>
                @endforeach
                </tbody>
              </table>
		    </div>
		</div>
	  </div>
  </div>
</section>
<script>
$(document).ready(function()
{
  $('#menus').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
            "search":"Buscar:",
            "lengthMenu": "Ver _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
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