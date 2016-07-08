<div class="modal modal-default fade" id="verMenuEditar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titulo_verMenuEditar"></h4>
      </div>
      <div class="modal-body ">
        <div class="box-body">
        <center>
              <label for="" class="col-lg-12 col-md-12 control-label">Nombre Menú</label>
              <div class="input-group col-lg-8 col-md-12">
                      <input type="text" id="nombre_edit" name="nombre_edit" class="form-control"/>
                      <span class="input-group-addon"><i class="fa fa-rocket"></i></span>
                </div><br>
                <label for="" class="col-lg-12 col-md-12 control-label">Menú Padre</label>  
              <div class="input-group col-lg-8">
                <input type="hidden" id="id_menu_padre_edit" name="id_menu_padre_edit" class="form-control" readonly/>
                      <input type="text" id="menu_padre_edit" name="menu_padre_edit" class="form-control" readonly/>
                      <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                </div>
                <div class="input-group col-lg-4">
                <button class="btn btn-primary" onclick="menu_BuscarPadre_edit()"><i class="fa fa-search"></i>Buscar</button>
                </div><br>
                <label for="" class="col-lg-12 col-md-12 control-label">URL</label> 
              <div class="input-group col-lg-8">
                      <input type="text" id="url_edit" name="url_edit" class="form-control" onblur="verificar_url_edit();"/>
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                </div> 
                <label for="" class="col-lg-12 col-md-12 control-label">Icono</label> 
              <div class="input-group col-lg-8">
                      <input type="text" id="icono_edit" name="icono_edit" class="form-control" />
                      <span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
                </div> <br>
                <div class="col-lg-12">
            <button class="btn btn-success" onclick="Guardar_Menu_edit()"><i class="glyphicon glyphicon-floppy-disk"></i>Editar Menú</button>                 
                </div> 
          </center>   
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