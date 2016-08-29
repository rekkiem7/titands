@include('head')
<style>
@media screen and (min-width: 992px) {
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
 }
}

@media screen and (max-width: 991px) {
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
    display:none;
}

}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
    height:50%;
}

</style>
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
		              <li class="active TitanTab"><a href="#resumen" data-toggle="tab">&nbsp;&nbsp;Resumen</a></li>
		              <li ><a  href="#datos" data-toggle="tab">&nbsp;&nbsp;Ficha Producto</a></li>    
		            </ul>
		            <div class="tab-content">
		              <div class="active tab-pane animated fadeIn" id="resumen">
							<div id="main_area">
						        <!-- Slider -->
						        <div class="row">
						        	<div class="col-lg-6" >
						        	<center><h3>{{$producto[0]->nombre}}</h3></center>
						            <div class="col-lg-12" id="slider-thumbs">
						                <!-- Bottom switcher of slider -->
						                <ul class="hide-bullets">
						                	<?php 
						                	$i=0;
						                	foreach($imagenes as $row)
						                	{?>
						                    <li class="col-sm-3">
						                        <a class="thumbnail" id="carousel-selector-{{$i}}">
						                            <img src="{{asset($row->url)}}">
						                        </a>
						                    </li>
						                    <?php
						                    $i++;
						                	}
						                    ?>
						                </ul>
						                </div>
           				 			</div>
						        	<div class="col-sm-12 col-lg-6">
                					<div  id="slider">
					                    <!-- Top part of the slider -->
					                    <div class="row">
					                        <div class="col-lg-10" id="carousel-bounding-box">
					                            <div class="carousel slide" id="myCarousel">
					                                <!-- Carousel items -->
					                                <div class="carousel-inner">
				                                	<?php 
								                	$z=0;
								                	foreach($imagenes as $row2)
								                	{
								                		if($z==0)
								                		{?>
								                			<div class="active item" data-slide-number="{{$z}}">
								                		<?php
								                		}
								                		else
								                		{?>
								                			<div class="item" data-slide-number="{{$z}}">
								                		<?php
								                		}
								                		?>
				                                        	<img src="{{asset($row2->url)}}" ></div>
													<?php
													$z++;
													} 
													?>     
                                					</div>
                                					<!-- Carousel nav -->
					                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					                                    <span class="glyphicon glyphicon-chevron-left"></span>
					                                </a>
					                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					                                    <span class="glyphicon glyphicon-chevron-right"></span>
					                                </a>
                            					</div>
                        					</div>
                    					</div>
                					</div>
            					</div>
            				<!--/Slider-->
						            
            					
        					</div>
        					<div class="col-lg-12">
        						<?php echo $producto[0]->descripcion?>
        					</div>
    					</div>	 			
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
<script>
jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>
@include('footer')
