<script src="../../public/template/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  function MostrarDivCompletarInformacion()
  {
    $('#DivCompletarInformacion').css('display', 'block'); 
  }
    $(document).ready(function()
    {  
        $('#FechaDeEntrega').datepicker({ autoclose: true });
    });
</script>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">BUSCAR PRODUCTO</h3>
    </div>
    <br>
    <label for="" class="col-lg-3 col-md-12 control-label">Codigo Producto</label>
    <div class="input-group col-lg-8 col-md-12">
        <input class="form-control" id="CodigoProducto" name="CodigoProducto"/>
        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
    </div>
    <br>
    <label for="" class="col-lg-3 col-md-12 control-label">Descripcion Producto</label>
    <div class="input-group col-lg-8 col-md-12">
        <input class="form-control" id="DescripcionProducto" name="DescripcionProducto"/>
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
    </div>
    <br>
    <div class="col-lg-2 col-md-2 col-sm-2">
        <center><button type="button" class="btn btn-block btn-primary" onclick="MostrarDivCompletarInformacion();">Buscar&nbsp;&nbsp;<i class="glyphicon glyphicon-search"></i></button></center>
    </div>
    <br><br><br>
    <div id="DivCompletarInformacion" style="display:none">           
        <div class="box-header with-border">
            <h3 class="box-title">COMPLETAR INFORMACION</h3>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Nombre Producto</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="NombreProducto" name="NombreProducto" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Descripcion Producto</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="DescripcionProducto" name="DescripcionProducto" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-bold"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Cantidad Minima</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="CantidadMinima" name="CantidadMinima"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
        </div>         
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Unidad De Medida</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="UnidadDeMedida" name="UnidadDeMedida" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Cantidad Venta</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="CantidadVenta" name="CantidadVenta"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Promocion Cantidad</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="PromocionCantidad" name="PromocionCantidad" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Descuento 1</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="DescuentoProducto1" name="DescuentoProducto1"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Descuento 2</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="DescuentoProducto2" name="DescuentoProducto2" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Descuento 3</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="DescuentoProducto3" name="DescuentoProducto3" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Subtotal</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Subtotal" name="Subtotal" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        </div>  

        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Fecha De Entrega</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="FechaDeEntrega" name="FechaDeEntrega" value="<?=date('d-m-Y')?>" readonly="readonly"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
        </div>  
</div>
<!-- -->
            <div class="box-header with-border">
        <h3 class="box-title">PRODUCTOS AGREGADOS</h3>
    </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto; overflow-y:auto;">
              <table class="table table-bordered">
                <tbody>
                <tr>
                      <th>#</th>
                      <th>CODIGO</th>
                      <th>NOMBRE</th>
                      <th>U.MEDIDA</th>
                      <th>CANT.MIN</th>
                      <th>PRECIO</th>
                      <th>CANT.VTA</th>
                      <th>DESC 1</th>
                      <th>DESC 2</th>
                      <th>DESC 3</th>
                      <th>PRECIO VTA.</th>
                      <th>SUBTOTAL</th>
                  </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              </tbody></table>
            </div>
<!-- -->
        <br>
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
                <center>
                        <button onclick="Direccionar('InfoDespacho');"  type="button" class="btn btn-block btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>
                </center>
        </div>   
        <div class="col-lg-2 col-md-2 col-sm-2">
            <center><button type="button" class="btn btn-block btn-success">Guardar N.Venta&nbsp;&nbsp;<i class="glyphicon glyphicon-floppy-save"></i></button></center>
        </div>          
        <!-- /.col -->
      </div>

        
        <br><br>   
    
            <!-- /.box-body -->
</div>    
