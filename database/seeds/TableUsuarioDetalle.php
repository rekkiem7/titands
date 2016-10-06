<?php

use Illuminate\Database\Seeder;

class TableUsuarioDetalle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Usuario_Detalle::class)->create([
            'nombre'=>'Notebooks',
            'id_familia'=>1,
            'id_empresa'=>1,
            'visible'=>1
        ]);
    }
}
