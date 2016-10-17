<html>
<head>
    @include('plantilla')
    <style>
        .span12{
            -moz-box-shadow: 0 0 2px black;
            -webkit-box-shadow: 0 0 2px black;
            box-shadow: 0 0 2px black;
            background-color:#ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body style="background-color:#000000">

<div class="container"><br><br>
    <center><img src="{{asset('/archivos_empresas/1/LogoHeader1.png')}}" width="230px" height="90px"/></center>
    <div class="span12 row animated fadeInDown">
        <center>
            <h3>¡¡Acceso Restringido!!</h3><br>
            <h5>Estimado Usuario, usted no tiene permisos autorizados para acceder a éste módulo</h5>
        </center>
    </div>
</div>
</body>
</html>