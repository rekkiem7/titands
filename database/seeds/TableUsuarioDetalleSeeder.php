<?php

use Illuminate\Database\Seeder;

class TableUsuarioDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\UsuarioDetalle::class)->create([
            'id_usuario'=>1,
            'nombre1'=>'Pablo',
            'nombre2'=>'Andrés',
            'apellido_paterno'=>'Barría',
            'apellido_materno'=>'Reyes',
            'rut'=>'16844428-1',
            'sexo'=>'Masculino',
            'direccion'=>'Mapocho 1522 Depto 2624',
            'correo'=>'pbarria.reyes@gmail.com',
            'telefono'=>null,
            'celular'=>'76631136',
            'avatar'=>'archivos_empresas/1/profiles/1.jpg'
        ]);

        factory(App\models\UsuarioDetalle::class)->create([
            'id_usuario'=>2,
            'nombre1'=>'Eduardo',
            'nombre2'=>'Patricio',
            'apellido_paterno'=>'Vidal',
            'apellido_materno'=>'Troncoso',
            'rut'=>'14091305-1',
            'sexo'=>'Masculino',
            'direccion'=>'Mapocho 1522 Depto 2725',
            'correo'=>'edo.v81@gmail.com',
            'telefono'=>null,
            'celular'=>'45912491',
            'avatar'=>'archivos_empresas/1/profiles/2.jpg'
        ]);
    }
}
