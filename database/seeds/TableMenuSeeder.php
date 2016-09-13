<?php

use Illuminate\Database\Seeder;

class TableMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Menu::class)->create([
        		'nombre'=>'Configuración',
        		'id_padre'=>null,
        		'url'=>'/configuracion/1',
        		'icono'=>null,
        		'clase'=>'fa fa-gears',
        		'visible'=>1
        	]);

         factory(App\models\Menu::class)->create([
                'nombre'=>'Mantenedores',
                'id_padre'=>null,
                'url'=>'/mantenedores/2',
                'icono'=>null,
                'clase'=>'fa fa-wrench',
                'visible'=>1
            ]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Mantenedor Menús',
                'id_padre'=>2,
                'url'=>'/mant_menu/3',
                'icono'=>null,
                'clase'=>'fa fa-navicon',
                'visible'=>1
            ]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Crear Menú',
                'id_padre'=>3,
                'url'=>'/crear_menu/4',
                'icono'=>null,
                'clase'=>'fa fa-plus',
                'visible'=>1
            ]);
        factory(App\models\Menu::class)->create([
                'nombre'=>'Listado Menú',
                'id_padre'=>3,
                'url'=>'/Listado_menu/5',
                'icono'=>null,
                'clase'=>'fa fa-list-ol',
                'visible'=>1
            ]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Permisos',
                'id_padre'=>1,
                'url'=>'/permisos/6',
                'icono'=>null,
                'clase'=>'fa fa-lock',
                'visible'=>1
            ]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Permisos Por Rol',
                'id_padre'=>6,
                'url'=>'/permisos_rol/7',
                'icono'=>null,
                'clase'=>'fa fa-flag',
                'visible'=>1
            ]);
        factory(App\models\Menu::class)->create([
                'nombre'=>'Permisos Por Usuario',
                'id_padre'=>6,
                'url'=>'/Listado_menu/8',
                'icono'=>null,
                'clase'=>'fa fa-user',
                'visible'=>1
            ]);

         factory(App\models\Menu::class)->create([
                'nombre'=>'Pedidos',
                'id_padre'=>null,
                'url'=>'/pedidos/9',
                'icono'=>null,
                'clase'=>'fa fa-shopping-cart',
                'visible'=>1
            ]);

          factory(App\models\Menu::class)->create([
                'nombre'=>'Logística',
                'id_padre'=>null,
                'url'=>'/logistica/10',
                'icono'=>null,
                'clase'=>'fa fa-sitemap',
                'visible'=>1
            ]);

           factory(App\models\Menu::class)->create([
                'nombre'=>'Almacenamiento Logístico',
                'id_padre'=>10,
                'url'=>'/almacenamiento_logistico/11',
                'icono'=>null,
                'clase'=>'fa fa-archive',
                'visible'=>1
            ]);

           factory(App\models\Menu::class)->create([
                'nombre'=>'Bodegas',
                'id_padre'=>11,
                'url'=>'/bodegas/12',
                'icono'=>null,
                'clase'=>'fa fa-cubes',
                'visible'=>1
            ]);

           factory(App\models\Menu::class)->create([
                'nombre'=>'Sistema de Stock',
                'id_padre'=>11,
                'url'=>'/sistema_stok/13',
                'icono'=>null,
                'clase'=>'fa fa-cube',
                'visible'=>1
            ]);

           factory(App\models\Menu::class)->create([
                'nombre'=>'Productos',
                'id_padre'=>null,
                'url'=>'/productos/14',
                'icono'=>null,
                'clase'=>'fa fa-barcode',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Facturación Test',
                'id_padre'=>null,
                'url'=>'/facturacion_test/15',
                'icono'=>null,
                'clase'=>'fa fa-bomb',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Inventario',
                'id_padre'=>null,
                'url'=>'/inventario/16',
                'icono'=>null,
                'clase'=>'fa fa-cubes',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Crear Producto',
                'id_padre'=>14,
                'url'=>'/crear_producto/17',
                'icono'=>null,
                'clase'=>'fa fa-rocket',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Listado Productos',
                'id_padre'=>14,
                'url'=>'/listado_productos/18',
                'icono'=>null,
                'clase'=>'fa fa-list-ol',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Mantenedor Usuarios',
                'id_padre'=>2,
                'url'=>'/mant_usuarios/19',
                'icono'=>null,
                'clase'=>'fa fa-users',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Crear Usuario',
                'id_padre'=>19,
                'url'=>'/crear_usuario/20',
                'icono'=>null,
                'clase'=>'fa fa-user-plus',
                'visible'=>1
            ]);

            factory(App\models\Menu::class)->create([
                'nombre'=>'Listado Usuarios',
                'id_padre'=>19,
                'url'=>'/listado_usuarios/21',
                'icono'=>null,
                'clase'=>'fa fa-navicon',
                'visible'=>1
            ]);

        
    }
}
