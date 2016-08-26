<?php

use Illuminate\Database\Seeder;

class TableEmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Empresa::class)->create([
        		'nombre'=>'Titan Development Solutions',
                'skin'=>'skin-purple',
        		'visible'=>1
        	]);

        factory(App\models\Empresa::class)->create([
                'nombre'=>'Williamson Industrial',
                'skin'=>'skin-green',
                'visible'=>1
            ]);
    }
}
