<html>
<head>
    @include('plantilla')
    <style>
        body{
            background-repeat:no-repeat;
            background-color: #000000;
        }
        .mensaje{
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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mensaje animated fadeInUp">
   <div class="table-responsive"><?php echo $message;?></div>
</div>
</body>
</html>