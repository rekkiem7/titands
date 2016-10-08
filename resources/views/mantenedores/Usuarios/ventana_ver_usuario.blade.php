<div class="modal modal-default fade" id="ver_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulo">Ficha de Usuario</h4>
            </div>
            <div class="modal-body ">
                    <div class="box-body box-profile">
                        <div class="nav-tabs-custom">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active" id="Tabgeneral" ><a id="Ageneral" href="#general" data-toggle="tab">General</a></li>
                                    <li id="Tabdetalle"><a id="Adetalle" href="#detalle" data-toggle="tab">Detalle</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane animated fadeIn TitanTab" id="general">
                                        <div id="avatar_usuario"></div>
                                        <h3 class="profile-username text-center"><span id="ver_nombre_usuario"></span></h3>
                                        <p class="text-muted text-center">Usuario N° <span id="ver_id"></span></p>
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td><strong><i class="fa fa-user"></i> Nombre Completo</strong></td>
                                                <td><span id="ver_nombre_completo" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-asterisk"></i> Password</strong></td>
                                                <td><span id="ver_password" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-bank"></i> Empresa</strong></td>
                                                <td><span id="ver_empresa" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-building"></i> Sucursal</strong></td>
                                                <td><span id="ver_sucursal" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-building"></i> Departamento</strong></td>
                                                <td><span id="ver_departamento" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-flag"></i> Rol</strong></td>
                                                <td><span id="ver_rol" class="text-muted"></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane animated fadeIn" id="detalle">
                                        <div id="avatar_usuario2"></div>
                                        <h3 class="profile-username text-center"><span id="ver_nombre_usuario2"></span></h3>
                                        <p class="text-muted text-center">Usuario N° <span id="ver_id2"></span></p>
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td><strong><i class="fa fa-child"></i> Primer Nombre</strong></td>
                                                <td><span id="ver_primer_nombre" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-male"></i> Segundo Nombre</strong></td>
                                                <td><span id="ver_segundo_nombre" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-file-word-o"></i> Apellido Paterno</strong></td>
                                                <td><span id="ver_apellido_paterno" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-file-word-o"></i> Apellido Materno</strong></td>
                                                <td><span id="ver_apellido_materno" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-barcode"></i> RUT</strong></td>
                                                <td><span id="ver_rut" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-flag"></i> Sexo</strong></td>
                                                <td><span id="ver_sexo" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-map-marker"></i> Dirección</strong></td>
                                                <td><span id="ver_direccion" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-envelope"></i> Correo</strong></td>
                                                <td><span id="ver_correo" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-phone"></i> Teléfono</strong></td>
                                                <td><span id="ver_telefono" class="text-muted"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fa fa-mobile-phone"></i> Celular</strong></td>
                                                <td><span id="ver_celular" class="text-muted"></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>