<?php

use Illuminate\Database\Seeder;

class PasarelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pasarelas')->insert([
            'pasarela' => 'Flow',
        ]);
        \DB::table('pasarelas')->insert([
            'pasarela' => 'TransBank',
        ]);
    }
}
