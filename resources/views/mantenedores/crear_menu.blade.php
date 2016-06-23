@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Ingresar Menú</h3>
		    </div>
		    <div class="box-body">
	  		    	<label for="" class="col-lg-12 col-md-12 control-label">Nombre Menú</label>
	  		    	<div class="input-group col-lg-8 col-md-12">
	                  	<input type="text" id="nombre" name="nombre" class="form-control"/>
	                  	<span class="input-group-addon"><i class="fa fa-rocket"></i></span>
	            	</div><br>
	            	<label for="" class="col-lg-12 col-md-12 control-label">Menú Padre</label>	
	  		    	<div class="input-group col-lg-8">
	                  	<input type="text" id="menu_padre" name="menu_padre" class="form-control" readonly/>
	                  	<span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
	            	</div>
            		<div class="input-group col-lg-4">
	            	<button class="btn btn-primary"><i class="fa fa-search"></i>Buscar</button>
	            	</div><br>
	            	<label for="" class="col-lg-12 col-md-12 control-label">URL</label>	
	  		    	<div class="input-group col-lg-8">
	                  	<input type="text" id="url" name="url" class="form-control" />
	                  	<span class="input-group-addon"><i class="fa fa-globe"></i></span>
	            	</div> 
	            	<label for="" class="col-lg-12 col-md-12 control-label">Icono</label>	
	  		    	<div class="input-group col-lg-8">
	                  	<input type="text" id="icono" name="icono" class="form-control" />
	                  	<span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
	            	</div> <br>
	            	<div class="col-lg-8">
						<button class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar Menú</button>	            		
	            	</div>   	
		    </div>
		</div>
	  </div>
   </div>
</section>
@include('footer')