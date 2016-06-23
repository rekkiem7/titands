<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Descripción del producto
          <small>Texto visible para clientes y usuarios</small>
        </h3>
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>     
        </div>
    </div>
    <div class="box-body pad">
        <form>
              <textarea id="descripcionProducto" name="descripcionProducto" rows="10" cols="80"></textarea>
        </form>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
    <button onclick="Direccionar('restricciones');" type="button" class="btn btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>&nbsp;&nbsp;<button onclick="Direccionar('datosLogisticos');"  type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
</div><br><br>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('descripcionProducto');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>