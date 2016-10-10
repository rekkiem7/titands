<div class="modal modal-default fade" id="ventana_editar_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulo">Editar Usuario</h4>
            </div>
            <div class="modal-body ">
                <div class="box-body box-profile">
                    <div class="nav-tabs-custom">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active" id="Tabgeneral" ><a id="AEditarGeneral" href="#EditarGeneral" data-toggle="tab">General</a></li>
                                <li id="Tabdetalle"><a id="AEditarDetalle" href="#EditarDetalle" data-toggle="tab">Detalle</a></li>
                                <li id="Tabdetalle"><a id="AEditarFoto" href="#EditarFoto" data-toggle="tab">Foto de Perfil</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane animated fadeIn TitanTab" id="EditarGeneral">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <td><strong><i class="fa fa-user"></i>Usuario</strong></td>
                                            <td><input type="text" class="form-control requerido" name="editar_usuario" id="editar_usuario"/>
                                            <input type="hidden" id="editar_id" name="editar_id" class="form-control requerido"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-asterisk"></i> Password</strong></td>
                                            <td><input type="password" class="form-control requerido" name="editar_password" id="editar_password"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-bank"></i> Empresa</strong></td>
                                            <td>
                                                <select class="form-control requerido" id="editar_empresa" name=""editar_empresa">
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-building"></i> Sucursal</strong></td>
                                            <td>
                                                <select class="form-control requerido" id="editar_sucursal" name=""editar_sucursal">
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-building"></i> Departamento</strong></td>
                                            <td>
                                                <select class="form-control requerido" id="editar_departamento" name=""editar_departamento">
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-flag"></i> Rol</strong></td>
                                            <td>
                                                <select class="form-control requerido" id="editar_rol" name=""editar_rol">
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-eye"></i> Visible</strong></td>
                                            <td>
                                                <input type="checkbox" data-toggle="toggle" id="editar_visible" name="editar_visible" class="requerido">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane animated fadeIn" id="EditarDetalle">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <td><strong><i class="fa fa-child"></i> Primer Nombre</strong></td>
                                            <td><input type="text" class="form-control requerido" name="editar_primer_nombre" id="editar_primer_nombre"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-male"></i> Segundo Nombre</strong></td>
                                            <td><input type="text" class="form-control" name="editar_segundo_nombre" id="editar_segundo_nombre"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-file-word-o"></i> Apellido Paterno</strong></td>
                                            <td><input type="text" class="form-control requerido" name="editar_apellido_paterno" id="editar_apellido_paterno"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-file-word-o"></i> Apellido Materno</strong></td>
                                            <td><input type="text" class="form-control" name="editar_apellido_materno" id="editar_apellido_materno"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-barcode"></i> RUT</strong></td>
                                            <td><input type="text" class="form-control requerido" name="editar_rut" id="editar_rut"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-flag"></i> Sexo</strong></td>
                                            <td>
                                                <select class="form-control requerido" name="editar_sexo" id="editar_sexo">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-map-marker"></i> Dirección</strong></td>
                                            <td><input type="text" class="form-control" name="editar_direccion" id="editar_direccion"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-envelope"></i> Correo</strong></td>
                                            <td><input type="text" class="form-control" name="editar_correo" id="editar_correo" onblur="validarEmail(this.value);"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-phone"></i> Telefono</strong></td>
                                            <td><input type="text" class="form-control" name="editar_telefono" id="editar_telefono"/></td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="fa fa-mobile-phone"></i> Celular</strong></td>
                                            <td><input type="text" class="form-control" name="editar_celular" id="editar_celular"/></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="tab-pane animated fadeIn" id="EditarFoto">
                                    <div id="avatar_usuario_editar"></div>
                                    <h3 class="profile-username text-center"><span id="ver_nombre_editar_usuario"></span></h3>
                                    <p class="text-muted text-center">Usuario N° <span id="ver_id_editar"></span></p>
                                    <form enctype="multipart/form-data">
                                        <input id="editar_imagen" name="editar_imagen" class="file" type="file" >
                                    </form><br>
                                    <script>
                                        $('#editar_imagen').fileinput({
                                            language: 'es',
                                            showUpload:false,
                                            allowedFileExtensions : ['jpg', 'png','gif']
                                        });
                                    </script>
                                    <center><button class="btn btn-primary" onclick="update_usuario();"><i class="fa fa-pencil"></i> Editar</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#editar_rut').Rut();
</script>