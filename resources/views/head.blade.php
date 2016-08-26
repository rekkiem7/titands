<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema Tomahawk ERP</title>
        @include('plantilla')
    </head>
    <body class="{{$block_menu}}">
    <?php
    function dibujar_menu($menus)
    {
     if($menus)
                          {
                            foreach($menus as $row)
                            {
                                if($row->hijos || $row->hijos !=[])
                                {
                                    $hijos=$row->hijos;
                            ?>
                                <li class="treeview">
                                        <a href="#"><i class="{{$row->clase}}"></i><span>{{$row->nombre}}</span><i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                    <?php 
                                        for($i=0;$i<count($hijos);$i++)
                                        {
                                            if($hijos[$i]->hijos==[])
                                            {
                                           ?>
                                           <li><a href="{{asset($hijos[$i]->url)}}"><i class="{{$hijos[$i]->clase}}"></i> {{$hijos[$i]->nombre}}</a></li> 
                                           <?php
                                            }
                                            else
                                            {?><li class="treeview">
                                                    <a href="#"><i class="{{$hijos[$i]->clase}}"></i><span>{{$hijos[$i]->nombre}}</span><i class="fa fa-angle-left pull-right"></i></a>
                                                <ul class="treeview-menu">
                                            <?php
                                               
                                                dibujar_menu($hijos[$i]->hijos);
                                            ?></ul><?php
                                            }
                                        }
                                    ?>
                                    </ul>
                                </li>
                    <?php       }
                                else
                                {?>
                                  <li><a href="{{asset($row->url)}}"><i class="{{$row->clase}}"></i><span>{{$row->nombre}}</span></a></li>  
                                <?php
                                }
                            }
                          }                   
    }
    ?>
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{url()}}" class="logo"><img src="{{asset('/archivos_empresas/'.Session::get('id_empresa').'/LogoHeader1.png')}}" width="60%" /></a>
            <!--<img src="{{asset('/archivos_empresas/2/logo.jpg')}}" width="13%" height="10%"/>-->

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
    <img src="{{ asset('archivos_empresas/'.Session::get('id_empresa').'/profiles/'.Session::get('imagen')) }}" class="img-circle" alt="User Image"/>
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                    </ul><!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li><!-- /.messages-menu -->

                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li><!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li><!-- end notification -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks Menu -->
                        <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <!-- Task title and progress text -->
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <!-- The progress bar -->
                                                <div class="progress xs">
                                                    <!-- Change the css width attribute to simulate progress -->
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('archivos_empresas/'.Session::get('id_empresa').'/profiles/'.Session::get('imagen'))}}" class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{Session::get('nombre_completo')}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('archivos_empresas/'.Session::get('id_empresa').'/profiles/'.Session::get('imagen')) }}" class="img-circle" alt="User Image" />
                                    <p>
                                        {{Session::get('nombre_completo')}} - {{Session::get('nom_rol')}}
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('archivos_empresas/'.Session::get('id_empresa').'/profiles/'.Session::get('imagen')) }}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{Session::get('nombre_completo')}}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

              

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header"><a href="{{asset('/home')}}"><i class="fa fa-home"></i>&nbsp;<span>HOME</span></a></li>
                    <!-- Optionally, you can add icons to the links -->
                    <?php
                        dibujar_menu($menus);
                    ?>           
                    <li><a href="javascript:history.back()"><i class="fa fa-reply"></i><span>Volver</span></a></li>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{$titulo}}
                    <small>{{$subtitulo}}</small>
                </h1>
                
            </section>

            <!-- Main content -->
            <section class="content">