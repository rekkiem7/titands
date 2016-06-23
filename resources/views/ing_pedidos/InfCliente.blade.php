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
<script type="text/javascript">
    $(document).ready(function()
    {   
        $('#FechaDeEntrega').datepicker({ autoclose: true });
    });
</script>
<!-- TODO: Alinear largo de imputs -->
<div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">INFORMACION GENERAL</h3>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-3 col-sm-12 control-label">Fecha Pedido</label>
        <div class="input-group col-lg-5 col-md-5 col-sm-12">
            <input class="form-control" id="FechaPedido" name="FechaPedido" value="<?=date("d-m-Y")?>" readonly/>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Rut Vendedor</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="RutVendedor" name="RutVendedor" placeholder="11.111.111-1"/>
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Nombre Vendedor</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="NombreVendedor" name="NombreVendedor" value="Vendedor" readonly/>
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>   
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Moneda</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Moneda" name="Moneda" value="Pesos Chilenos" readonly/>
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
        </div>  
        <br><br>          
        <div class="box-header with-border">
            <h3 class="box-title">INFORMACION CLIENTE</h3>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Rut Cliente</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="RutCliente" name="RutCliente" placeholder="11.111.111-1"/>
            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
        </div>       
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Nombre Cliente</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="NombreVendedor" name="NombreVendedor" value="Vendedor" readonly/>
            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
        </div>         
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Lista De Precios</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="ListaDePrecios" name="Lista De Precios"/>
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Condición De Venta</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="CondicionDeVenta" name="CondicionDeVenta"/>
            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Contacto</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Contacto" name="Contacto" value="" />
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Fecha De Entrega</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="FechaDeEntrega" name="FechaDeEntrega" />
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div> 
        <br><br>
        <div class="col-lg-2 col-md-2 col-sm-2">
            <center>
                    <button onclick="Direccionar('InfoPedido');" type="button" class="btn btn-block btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
            </center>
        </div>     
        <br><br> 
</div>