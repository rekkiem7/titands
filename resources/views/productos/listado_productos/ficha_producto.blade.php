@include('head')

<section class="content">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Producto</h3>
		    </div>
		    <div class="box-body">
		    	<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active TitanTab"><a  href="#resumen" data-toggle="tab">&nbsp;&nbsp;Resumen</a></li>
		              <li ><a  href="#datos" data-toggle="tab">&nbsp;&nbsp;Datos</a></li>    
		            </ul>
		            <div class="tab-content">
		              <div class="active tab-pane animated fadeIn" id="resumen">
								 			
					  </div>
		           
		              <div class="tab-pane animated fadeIn" id="datos">
		              panel 2
		              </div>
		            </div>
		         </div>
		    </div> 
		</div>
    </div>
   </div>
</section>
@include('footer')
