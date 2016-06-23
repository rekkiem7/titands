@include('head',array('titulo'=>$titulo,'subtitulo'=>$subtitulo))
<div id="carrusel" class="carousel slide animated fadeInRight" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carrusel" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel" data-slide-to="0" class=""></li>
            
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('fondo2.png')}}" alt="Titan Development Solutions" />
                        <div class="carousel-caption">Ya se encuentra disponible nuestra página <strong>Titan Development Solutions</strong>, encontrarás servicios especializados de TI. Visitanos en <a href="http://www.titands.cl">www.titands.cl</a></div>
                    </div>
                    <div class="item ">
                        <img src="{{asset('fondo.jpg')}}" alt="Tercer Slide" />
                        <div class="carousel-caption">En Tomahawk-ERP encontrarás una aplicación de alto nivel. Bienvenido al mundo privilegiado de <strong>Titan Development Solutions</strong></div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carrusel" data-slide="prev"><span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carrusel" data-slide="next"><span class="fa fa-angle-right"></span>
                </a>
                </div>
@include('footer')
