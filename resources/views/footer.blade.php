<meta name="csrf-token" content="{{ csrf_token() }}">
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                
            </div>
            <!-- Default to the left -->
           <center> <strong>Copyright © 2016 <a href="#">Titan Development Solutions</a>.</strong> Todos los derechos reservados.</center>
        </footer>

    </div><!-- ./wrapper -->
    </body>
</html>
<script>
function sinsesion()
{
    swal("Sesión Expirada", "Estimado(a) Usuario(a), su sesión ha caducado, inicie nuevamente", "info");
    setTimeout(function(){ 

        window.open('{{URL::to("/")}}','_self');
     }, 1500);
}
</script>