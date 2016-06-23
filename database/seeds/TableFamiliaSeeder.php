<?php

use Illuminate\Database\Seeder;

class TableFamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\models\Familia::class)->create([
        		'nombre'=>'Tecnología',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Familia::class)->create([
                'nombre'=>'Electrodomésticos',
                'id_empresa'=>1,
                'visible'=>1
            ]);
    }
}
