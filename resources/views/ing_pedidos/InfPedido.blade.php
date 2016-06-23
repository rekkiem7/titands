<style>
    .WidthInput12
    {
        width: 12%;
    }
    .input-group-addon
    {
        border: 0;
    }
</style>
<script src="../../public/template/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {  
        $('#FechaDeEntrega').datepicker({ autoclose: true });
    });
</script>
<!-- TODO: Alinear largo de imputs -->
<div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">INFORMACION PEDIDO</h3>
        </div>      
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Cotizacion</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Cotizacion" name="Cotizacion" />
            <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Orden De Compra</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="OrdenDeCompra" name="OrdenDeCompra" />
            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Adjuntar Orden</label>
        <div class="input-group col-lg-8 col-md-12">
            <input type="file" class="form-control" id="AdjuntarOrden" name="AdjuntarOrden" />
            <span class="input-group-addon"><i class="fa fa-upload"></i></span>
        </div> 
        <br>                
        <label for="" class="col-lg-3 col-md-12 control-label">% Descuento 1</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Descuento1" name="Descuento1" />
            <span class="input-group-addon"><i class="fa fa-long-arrow-down"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">% Descuento 2</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Descuento2" name="Descuento2" />
            <span class="input-group-addon"><i class="fa fa-long-arrow-down"></i></span>
        </div>                                   
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">% Descuento 3</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Descuento3" name="Descuento3" />
            <span class="input-group-addon"><i class="fa fa-long-arrow-down"></i></span>
        </div>   
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Comentarios</label>
        <div class="input-group col-lg-8 col-md-12">
            <textarea class="form-control" id="Comentarios" name="Comentarios" rows="10"></textarea>
            <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
        </div> 
        <br><br>
     
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
                <center>
                        <button onclick="Direccionar('InfoCliente');"  type="button" class="btn btn-block btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>
                </center>
        </div>   
        <div class="col-lg-2 col-md-2 col-sm-2">
                <center>
                        <button onclick="Direccionar('InfoDespacho');"  type="button" class="btn btn-block btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
                </center>
        </div>           
        <!-- /.col -->
      </div>        
        <br><br>
</div>