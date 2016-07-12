<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Tipo</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
    <select class="form-control requerido" id="tipo" name="tipo" onchange="productos_selectTipoProducto();">
    	<option value="0">Seleccione el tipo...</option>
    	<option value="1">Producto Estándar</option>
		<option value="2">Pack de Productos</option>
    	<option value="3" disabled>Producto Virtual</option>
    </select>
    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
</div><br>
<div id="tipo_1" style="display:none" class="animated fadeIn">
	<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Familia</label>
  	<div class="input-group col-lg-5 col-md-5 col-sm-12">
        <select class="form-control requerido" id="familia" name="familia" onchange="">
        	<option value="0">Seleccione la familia...</option>
        	@foreach($familia as $row0)
            <option value="{{$row0->id}}">{{$row0->nombre}}</option>
            @endforeach
        </select>
        <span class="input-group-addon"><i class="fa fa-users"></i></span>
	</div><br>
	<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Categoria</label>
  	<div class="input-group col-lg-5 col-md-5 col-sm-12">
        <select class="form-control requerido" id="categoria" name="categoria" onchange="">
        	
    	</select>
        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
	</div><br>
	<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Nombre</label>
  	<div class="input-group col-lg-5 col-md-5 col-sm-12">
        <input type="type" class="form-control requerido" id="nombre" name="nombre"/>
        <span class="input-group-addon"><i class="fa fa-file-word-o"></i></span>
	</div><br>
	<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Codigo General</label>
  	<div class="input-group col-lg-5 col-md-5 col-sm-12">
        <input type="type" class="form-control requerido" id="codigoGeneral" name="codigoGeneral"/>
        <span class="input-group-addon"><i class="fa fa-star"></i></span>
    </div><br>
    <label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Unidad de Medida</label>
    <div class="input-group col-lg-5 col-md-5 col-sm-12">
        <select class="form-control requerido" id="unidadMedida" name="unidadMedida" onchange="productos_updateLabel()">
            <option value="0">Seleccione la Unidad de Medida</option>
            @foreach($unidad_medida as $row_unid)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
            @endforeach
        </select>
        <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
    </div><br>
	<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Precio de Venta($<p id="abrev"></p></label>
  	<div class="input-group col-lg-5 col-md-5 col-sm-12">
        <input type="number" class="form-control requerido" id="precioVenta" name="precioVenta"/>
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
	</div><br>			            	
	<div class="col-lg-8 col-md-8 col-sm-12">
		<button onclick="Direccionar('restricciones');" type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
	</div><br><br>




