<?php

use Illuminate\Database\Seeder;

class TableUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Usuario::class)->create([
        		'usuario'=>'pbarria',
        		'pass'=>'utemmacul1097',
                'nombre'=>'Pablo Andrés Barría Reyes',
                'imagen'=>'archivos_empresas/1/profiles/1_16844428-1.jpg',
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
                'visible'=>1
        	]);

        factory(App\models\Usuario::class)->create([
        		'usuario'=>'evidal',
        		'pass'=>'r4p4nu1',
        		'nombre'=>'Eduardo Patricio Vidal Troncoso',
                'imagen'=>'archivos_empresas/1/profiles/2_14091305-1.jpg',
        		'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'visible'=>1
        	]);

        factory(App\models\Usuario::class)->create([
                'usuario'=>'william',
                'pass'=>'12345',
                'nombre'=>'Eduardo Patricio Vidal Troncoso',
                'imagen'=>'archivos_empresas/2/profiles/3_14091305-1.jpg',
                'id_rol'=>28,
                'id_depto'=>9,
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Usuario::class)->create([
                'usuario'=>'logistica',
                'pass'=>'12345',
                'nombre'=>'Eduardo Patricio Vidal Troncoso',
                'imagen'=>'archivos_empresas/1/profiles/4_14091305-1.png',
                'id_rol'=>7,
                'id_depto'=>3,
                'id_empresa'=>1,
                'visible'=>1
            ]);

        factory(App\models\Usuario::class)->create([
                'usuario'=>'Ventas',
                'pass'=>'12345',
                'nombre'=>'Pablo Andrés Barría Reyes',
                'imagen'=>'archivos_empresas/2/profiles/5_16844428-1.jpg',
                'id_rol'=>29,
                'id_depto'=>9,
                'id_empresa'=>2,
                'visible'=>1
            ]);
    }
}
