<?php

use Illuminate\Database\Seeder;

class TableSucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\models\Sucursal::class)->create([
        		'nombre'=>'Santiago',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Sucursal::class)->create([
        		'nombre'=>'Región Santiago',
        		'id_empresa'=>2,
        		'visible'=>1
        	]);
    }
}
