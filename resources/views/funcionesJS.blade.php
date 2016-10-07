<script>
function sinsesion()
{
swal("Sesión Expirada", "Estimado(a) Usuario(a), su sesión ha caducado, inicie nuevamente", "info");
setTimeout(function(){
window.open("{{URL::to('/')}}","_self");
}, 1500);
}
</script>