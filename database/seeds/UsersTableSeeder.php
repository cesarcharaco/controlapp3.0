<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        	'name' => 'Administrador',
            'rut' => '12121212121',
        	'email' => 'admin@eiche.cl',
        	'password' => bcrypt('EICHE_CONTROL'),
            'tipo_usuario' => 'Admin'
        ]);

        \DB::table('users')->insert([
            'name' => 'Francisco Carpio',
            'rut' => '121212121',
            'email' => 'franciscocarpio@eiche.cl',
            'password' => bcrypt('EICHE_CONTROL'),
            'tipo_usuario' => 'Residente'
        ]);

        \DB::table('users')->insert([
            'name' => 'María Garcia',
            'rut' => '121212145',
            'email' => 'mariagarcia@eiche.cl',
            'password' => bcrypt('EICHE_CONTROL'),
            'tipo_usuario' => 'Otro'
        ]);
    }
}
