<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\models\Usuario::class, function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->name,
        'pass' => $faker->name,
        'nombre' => $faker->name,
        'imagen' => $faker->name,
        'id_rol' => $faker->name,
        'id_depto' => $faker->name,
        'id_empresa'=> $faker->name,
        'visible' => $faker->name,
    ];
});

$factory->define(App\models\Menu::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_padre' => $faker->name,
        'url' => $faker->name,
        'icono'=> $faker->name,
        'clase'=> $faker->name,
        'visible'=> $faker->name,
    ];
});

$factory->define(App\models\Empresa::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'skin'=>$faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Sucursal::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_empresa' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Departamento::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_empresa' => $faker->name,
        'id_sucursal' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Rol::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_depto' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Permisos_rol::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'id_menu' => $faker->name,
        'id_rol' => $faker->name,
        'id_depto' => $faker->name,
        'id_empresa' => $faker->name,
        'agregar' => $faker->name,
        'eliminar' => $faker->name,
        'reportes' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\UnidadMedida::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'descripcion' => $faker->name,
        'abrev' => $faker->name
    ];
});

$factory->define(App\models\Familia::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_empresa' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Categoria::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_familia' => $faker->name,
        'id_empresa' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Producto::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'id_empresa' => $faker->name,
        'codigo' => $faker->name,
        'nombre' => $faker->name,
        'tipo' => $faker->name,
        'familia' => $faker->name,
        'categoria' => $faker->name,
        'unidadMedida' => $faker->name,
        'precioVenta' => $faker->name,
        'cantidadMinimaVenta' => $faker->name,
        'precioPorMayor' => $faker->name,
        'cantidadPrecioPorMayor' => $faker->name,
        'visible' => $faker->name,
        'disponiblePedidos' => $faker->name,
        'mostrarPrecio' => $faker->name,
        'disponibleOnline' => $faker->name,
        'descripcion' => $faker->name,
        'usuario_creacion' => $faker->name,
        'usuario_modificacion' => $faker->name
    ];
});

$factory->define(App\models\ProductoLogistico::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'idProducto' => $faker->name,
        'codigo' => $faker->name,
        'ancho' => $faker->name,
        'alto' => $faker->name,
        'profundidad' => $faker->name,
        'unidadDimensiones' => $faker->name,
        'peso' => $faker->name,
        'unidadPeso' => $faker->name,
        'cantidadPorUEmpaque' => $faker->name,
        'anchoEmpaque' => $faker->name,
        'altoEmpaque' => $faker->name,
        'profundidadEmpaque' => $faker->name,
        'unidadDimensionesEmpaque' => $faker->name,
        'pesoEmpaque' => $faker->name,
        'unidadPesoEmpaque' => $faker->name
    ];
});

$factory->define(App\models\ProductoImagenes::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'idProducto' => $faker->name,
        'codigo' => $faker->name,
        'nombreImagen' => $faker->name,
        'url' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\UsuarioDetalle::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'id_usuario' => $faker->name,
        'nombre1' => $faker->name,
        'nombre2' => $faker->name,
        'apellido_paterno' => $faker->name,
        'apellido_materno' => $faker->name,
        'rut' => $faker->name,
        'sexo' => $faker->name,
        'direccion' => $faker->name,
        'correo' => $faker->name,
        'telefono' => $faker->name,
        'celular' => $faker->name,
        'avatar' => $faker->name,
    ];
});
