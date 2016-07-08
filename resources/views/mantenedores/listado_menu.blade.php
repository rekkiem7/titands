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
                <tr><td style="text-align:center">{{$row->id}}</td><td>{{$row->nombre}}</td><td>{{$row->nombre_padre}}</td><td style="text-align:center"><button class="btn btn-primary" onclick="Listado_menu_EditarMenu({{$row->id}});"> <i class="fa fa-edit"></i></button></td><td style="text-align:center"><button class="btn btn-danger" onclick="Listado_menu_BorrarMenu({{$row->id}});"> <i class="fa fa-remove"></i></button></td></tr>
                @endforeach
                </tbody>
              </table>
		    </div>
		</div>
	  </div>
  </div>
</section>
<script>
function Listado_menu_EditarMenu(id)
{
  waitingDialog.show();
    $.ajax({
        url: '{{url()}}/info_menu_editar',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{id:id},
        success:function(data)
        {
          waitingDialog.hide();
          if(data==0)
          {
            swal("Error", "Se ha producido un error al consultar el menú", "error");
          }
          else
          {
            if(data=='SINSESION')
            {
              sinsesion();
            }
            else
            {
              
            }
          }
        }
      });
}
function Listado_menu_BorrarMenu(id)
{
  swal({   title: "¿Eliminar Menú?",   text: "¿Desea eliminar el menú seleccionado? El menú ya no estará disponible para ningún usuario.",   type: "info",   showCancelButton: true,   confirmButtonColor: '#CC00000',   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: false,   closeOnCancel: true },
      function(isConfirm)
      {   
          if (isConfirm) 
          {     
               $.ajax({
                  url: '{{url()}}/delete_menu',
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:{id:id,estado:0},
                  success:function(data)
                  {
                    if(data==0)
                    {
                      swal("Error", "Se ha producido un error al eliminar el menú, inténtelo nuevamente", "error");
                    }
                    else
                    {
                      if(data=='SINSESION')
                      {
                        sinsesion();
                      }
                      else
                      {
                        swal("Menú Eliminado", "El menú seleccionado ha sido eliminado correctamente", "success");
                      }
                    }
                  }
              });
          }  
      });
}
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