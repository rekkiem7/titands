<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Ancho</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control requerido"  id="anchoProducto" name="anchoProducto"/>
		<select class="form-control requerido" id="unidadAnchoProducto" name="unidadAnchoProducto"onchange="">
		    @foreach($unidad_medida as $row_unid)
		    @if($row_unid->id==7 || $row_unid->id==8 ||$row_unid->id==9)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
            @endif
            @endforeach
		</select>
	<span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Alto</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control requerido" id="altoProducto" name="altoProducto"/>
		<select class="form-control requerido"  id="unidadAltoProducto" name="unidadAltoProducto" onchange="">
		    @foreach($unidad_medida as $row_unid)
		    @if($row_unid->id==7 || $row_unid->id==8 ||$row_unid->id==9)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
            @endif
            @endforeach
		</select>
	<span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Profundidad</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control requerido" id="profundidadProducto" name="profundidadProducto"/>
		<select class="form-control requerido"  id="unidadProfundidadProducto" name="unidadProfundidadProducto" onchange="">
		    @foreach($unidad_medida as $row_unid)
		    @if($row_unid->id==7 || $row_unid->id==8 ||$row_unid->id==9)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
            @endif
            @endforeach
		</select>
	<span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
</div><br>

<label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Peso</label>
<div class="input-group col-lg-5 col-md-5 col-sm-12">
	<input type="number" class="form-control requerido" id="pesoProducto" name="pesoProducto"/>
		<select class="form-control requerido" id="unidadPesoProducto" name="unidadPesoProducto" onchange="">
		    @foreach($unidad_medida as $row_unid)
		    @if($row_unid->id==2 || $row_unid->id==3 ||$row_unid->id==4)
            <option value="{{$row_unid->id}}">{{$row_unid->abrev}}</option>
			@endif             
            @endforeach
		</select>
	<span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
</div><br>
<div class="col-lg-8 col-md-8 col-sm-12">
	<button onclick="Direccionar('descripcion');" type="button" class="btn btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>&nbsp;&nbsp;<button onclick="Direccionar('datosEmpaquetado');"  type="button" class="btn btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
</div><br><br>