@include('head',array('titulo'=>$titulo,'subtitulo'=>$subtitulo))
<script type="text/javascript">
    function Direccionar(DondeDireccionar)
    {
        // ACTIVA EL TAB SEGUN EL ID ANCHOR
    	  $('#A'+DondeDireccionar).click();
        // QUITA TODOS LOS CLASS ACTIVES DE LOS TAB
        $('.TitanTab').each(function() {
            $(this).removeClass("active");
        });      
        // ACTIVA EL TAB SELECCIONADO
        $("#Tab"+DondeDireccionar).addClass("active"); 
        // VUELVE AL INICIO DE LA PAGINA
        $('html, body').animate({scrollTop:0}, 'slow');
    }
</script>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li id="TabInfoCliente" class="TitanTab">
                    <a id="AInfoCliente" href="#InfoCliente" data-toggle="tab" aria-expanded="false">INFO GENERAL</a>
                </li>
                <li id="TabInfoPedido" class="TitanTab">
                    <a id="AInfoPedido" href="#InfoPedido" data-toggle="tab" aria-expanded="false">INFO PEDIDO</a>
                </li>
                <li id="TabInfoDespacho" class="TitanTab">
                    <a id="AInfoDespacho" href="#InfoDespacho" data-toggle="tab" aria-expanded="false">DIRECCION</a>
                </li>
                <li id="TabInfoArticulos" class="TitanTab">
                    <a id="AInfoArticulos" href="#InfoArticulos" data-toggle="tab" aria-expanded="true">ARTICULOS</a>
                </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="InfoCliente">
              @include('ing_pedidos/InfCliente')
              </div>
              <div class="tab-pane" id="InfoPedido">
              @include('ing_pedidos/InfPedido')
              </div>                
              <div class="tab-pane" id="InfoDespacho">
              @include('ing_pedidos/InfDespacho')
              </div>
              <div class="tab-pane" id="InfoArticulos">
              @include('ing_pedidos/InfArticulos')
              </div>              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

@include('footer')
