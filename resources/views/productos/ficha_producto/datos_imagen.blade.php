
<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Imágenes del Producto</label>
<div class="input-group col-lg-12 col-md-12 col-sm-12">
	<form enctype="multipart/form-data">
    <input id="imagenesProducto" class="file" type="file" multiple data-min-file-count="1">
    </form>
</div><br>
            
<div class="col-lg-8 col-md-8 col-sm-12">
	<button onclick="Direccionar('datosEmpaquetado');" type="button" class="btn btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>&nbsp;&nbsp;<button class="btn btn-success" id="s5">Guardar  <i class="glyphicon glyphicon-floppy-disk"></i></button>
</div><br><br>
<script>
$('#imagenesProducto').fileinput({
		language: 'es',
		showUpload:false,
        allowedFileExtensions : ['jpg', 'png','gif']
    });
</script>