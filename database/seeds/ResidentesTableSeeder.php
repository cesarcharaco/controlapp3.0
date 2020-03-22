<?php

use Illuminate\Database\Seeder;

class ResidentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('residentes')->insert([
        	'nombres' => 'Admin',
            'apellidos' => 'de ControlApp',
        	'rut' => '123456789',
        	'telefono' => '8172817287182',
            'id_usuario' => 1
        ]);
        \DB::table('residentes')->insert([
        	'nombres' => 'Francisco',
            'apellidos' => 'Carpio',
        	'rut' => '987654321',
        	'telefono' => '881272837827382',
            'id_usuario' => 2
        ]);
        \DB::table('residentes')->insert([
        	'nombres' => 'Carmen',
            'apellidos' => 'García',
        	'rut' => '1728172837182',
        	'telefono' => '728717719273719',
            'id_usuario' => 3
        ]);
    }
}
