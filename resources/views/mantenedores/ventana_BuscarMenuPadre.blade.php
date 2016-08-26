<div class="modal modal-default fade" id="BuscarMenuPadre">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titulo">Listado de Menú</h4>
      </div>
      <div class="modal-body ">
        <div class="table-responsive">
        <table id="menus" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Menú</th>
                  <th>Menú Padre</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td><td>Menú Padre</td><td></td><td style="text-align:center"><button class="btn btn-primary" onclick="elegir_menu(0,'Menú Padre')"> <i class="fa fa-check-circle"></i></button></td>
                </tr>
                @foreach($all_menus as $row)
                <tr><td style="text-align:center">{{$row->id}}</td><td>{{$row->nombre}}</td><td>{{$row->nombre_padre}}</td><td style="text-align:center"><button class="btn btn-primary" onclick="elegir_menu({{$row->id}},'{{$row->nombre}}')"> <i class="fa fa-check-circle"></i></button></td></tr>
                @endforeach
                </tbody>
              </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
function elegir_menu(id,nombre)
{
  $('#id_menu_padre').val(id);
  $('#menu_padre').val(nombre);
  $('#BuscarMenuPadre').modal('hide');
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