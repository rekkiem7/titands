<?php

use Illuminate\Database\Seeder;

class TableCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Categoria::class)->create([
        		'nombre'=>'Notebooks',
        		'id_familia'=>1,
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Categoria::class)->create([
        		'nombre'=>'Computación',
        		'id_familia'=>1,
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Categoria::class)->create([
        		'nombre'=>'Accesorios',
        		'id_familia'=>1,
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Categoria::class)->create([
                'nombre'=>'Cocina',
                'id_familia'=>2,
                'id_empresa'=>1,
                'visible'=>1
            ]);
        factory(App\models\Categoria::class)->create([
                'nombre'=>'Cuidado Personal',
                'id_familia'=>2,
                'id_empresa'=>1,
                'visible'=>1
            ]);
    }
}
