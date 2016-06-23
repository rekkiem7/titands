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
            <h3 class="box-title">INFORMACION DESPACHO</h3>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Nombre Direccion</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="NombreDireccion" name="NombreDireccion"/>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Direccion Despacho</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="Direccion" name="Direccion"/>
            <span class="input-group-addon"><i class="fa fa-truck"></i></span>
        </div>
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Codigo Postal</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="CodigoPostal" name="CodigoPostal"/>
            <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
        </div>        
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Pais</label>
        <div class="input-group col-lg-8 col-md-12">
            <select class="form-control" id="Pais" name="Pais"><option value="">Seleccionar...</option></select>
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        </div>  
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Region</label>
        <div class="input-group col-lg-8 col-md-12">
            <select class="form-control" id="Region" name="Region"><option value="">Seleccionar...</option></select>
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Provincia</label>
        <div class="input-group col-lg-8 col-md-12">
            <select class="form-control" id="Provincia" name="Provincia"><option value="">Seleccionar...</option></select>
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Ciudad</label>
        <div class="input-group col-lg-8 col-md-12">
            <select class="form-control" id="Ciudad" name="Ciudad"><option value="">Seleccionar...</option></select>
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        </div>            
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Comuna</label>
        <div class="input-group col-lg-8 col-md-12">
            <select class="form-control" id="Comuna" name="Comuna"><option value="">Seleccionar...</option></select>
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        </div> 
        <br>
        <label for="" class="col-lg-3 col-md-12 control-label">Atencion A</label>
        <div class="input-group col-lg-8 col-md-12">
            <input class="form-control" id="AtencionA" name="AtencionA"/>
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>   
                                               <br><br>
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
                <center>
                        <button onclick="Direccionar('InfoPedido');"  type="button" class="btn btn-block btn-primary">Volver&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-left"></i></button>
                </center>
        </div>   
        <div class="col-lg-2 col-md-2 col-sm-2">
                <center>
                        <button onclick="Direccionar('InfoArticulos');"  type="button" class="btn btn-block btn-info">Continuar&nbsp;&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></button>
                </center>
        </div>           
        <!-- /.col -->
      </div>
        <br><br>
</div>