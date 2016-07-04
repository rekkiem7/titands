<?php

Route::get('/', 'ConfiguracionController@index');
Route::get('/inicio', 'ConfiguracionController@inicio');
Route::post('/login', 'ConfiguracionController@login');
Route::get('/home','ConfiguracionController@home');
Route::get('/logout','ConfiguracionController@logout');
Route::get('/configuracion/{menu}','ConfiguracionController@configuracion');
Route::get('/permisos_rol/{menu}','ConfiguracionController@permisos_rol');
Route::post('/get_departamentos','ConfiguracionController@get_departamentos');
Route::post('/get_roles','ConfiguracionController@get_roles');
Route::post('/get_permisos_rol','ConfiguracionController@get_permisos_rol');
Route::post('/get_permisos_rol_hijos','ConfiguracionController@get_permisos_rol_hijos');
Route::post('/actualizar_modulo_sinhijos','ConfiguracionController@actualizar_modulo_sinhijos');
Route::post('/actualizar_modulo_conhijos','ConfiguracionController@actualizar_modulo_conhijos');
Route::get('/logistica/{menu}','LogisticaController@index');
Route::get('/mantenedores/{menu}','MantenedoresController@index');
Route::get('/crear_menu/{menu}','MantenedoresController@crear_menu');
Route::get('/bodegas/{menu}','LogisticaController@bodegas');
Route::get('/productos/{menu}','ProductosController@index');
Route::get('/pedidos/{menu}','PedidosController@pedidos');
Route::get('/facturacion_test/{menu}','FacturacionController@facturacion_test');
Route::post('/facturasonline_token','FacturacionController@facturasonline_token');
Route::post('/facturasonline_facuturaElectronica','FacturacionController@facturasonline_facuturaElectronica');
Route::post('/get_sucursal','ConfiguracionController@get_sucursal');
Route::post('/get_categorias','ProductosController@get_categorias');
Route::post('/verificar_url','MantenedoresController@verificar_url');
Route::post('/add_menu','MantenedoresController@add_menu');
Route::get('/Listado_menu/{menu}','MantenedoresController@Listado_menu');