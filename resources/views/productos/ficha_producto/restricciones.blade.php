<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Cantidad Mínima de Venta</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control" placeholder="Cantidad Mínima" id="cantidadMinimaVenta" name="cantidadMinimaVenta"/>
	<select class="form-control" id="unidadCantidadMinimaVenta" name="unidadCantidadMinimaVenta">
            <option value="0">Seleccione la Unidad de Medida</option>
            @foreach($unidad_medida as $row_unid)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
            @endforeach
     </select>	
	<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div><br>
<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Precio por Mayor</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control" id="precioPorMayor" name="precioPorMayor" placeholder="Precio de venta al por mayor" />
	<input type="number" class="form-control" placeholder="Cantidad Mínima" id="cantidadMinimaPorMayor" name="cantidadMinimaPorMayor"/>	
	<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div><br>			
<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Visible</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
    <input type="checkbox" checked data-toggle="toggle" id="visible" name="visible">
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Disponible para pedidos</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
    <input type="checkbox" checked data-toggle="toggle" id="disponiblePedidos" name="disponiblePedidos">
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Mostrar Precio</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
    <input type="checkbox" checked data-toggle="toggle" id="mostrarPrecio" name="mostrarPrecio">
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Disponible online</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
    <input type="checkbox" checked data-toggle="toggle" id="disponibleOnline" name="disponibleOnline">
</div><br>
<div class="col-lg-8 col-md-8 col-sm-12">
	<button onclick="Direccionar('datosGenerales');" type="button" class="btn btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>&nbsp;&nbsp;<button onclick="Direccionar('descripcion');"  type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
</div><br><br>