<?php

use Illuminate\Database\Seeder;

class TableUnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Unidad',
        		'abrev'=>'Unid.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Tonelada',
        		'abrev'=>'Tons.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Kilos',
        		'abrev'=>'Kg.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Gramos',
        		'abrev'=>'Grs.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Litros',
        		'abrev'=>'Lts.'
        	]);

     
        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Centímetros Cúbicos',
        		'abrev'=>'cc.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Metros',
        		'abrev'=>'mts.'
        	]);

        factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Centímetros',
        		'abrev'=>'cm.'
        	]);

         factory(App\models\UnidadMedida::class)->create([
        		'descripcion'=>'Milímetros',
        		'abrev'=>'mm.'
        	]);
    }
}
