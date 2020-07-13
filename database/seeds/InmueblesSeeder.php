<?php

use Illuminate\Database\Seeder;

class InmueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 50; $i++) { 
	        \DB::table('inmuebles')->insert([
	        	'idem' => 'Inmueble'.$i,
	        	'tipo' => 'Casa',
	        	'Status' => 'Disponible',
	        	'estacionamiento' => 'No',
	        	'id_admin' => 1
	        ]);
    	}
    }
}
