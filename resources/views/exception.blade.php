<html>
<head>
    @include('plantilla')
    <style>
        body{
            background-repeat:no-repeat;
            background-color: #000000;
        }
        .mensaje{
            width:auto !important;
            height:auto;
            background-color: #ffffff;
        }
    </style>
</head>
<body >
<div class="login-box animated fadeInDown">
    <div class="login-logo">
        <a href="{{url()}}" style="color:#ffffff"><b ><img src="{{asset('/archivos_empresas/1/LogoHeader1.png')}}" width="40%"/></b><br> Tomahawk Sytem</a>
    </div><!-- /.login-logo --><!-- /.login-box-body -->
</div><!-- /.login-box -->
<div class=" col-lg-offset-3 col-lg-9 col-md-offset-2 col-md-10   col-sm-12   col-xs-12 mensaje">
    <?php echo $message;?>
</div>
</body>
</html>