<?php

use Illuminate\Database\Seeder;
use App\Pareigos as pareigos;

class PareigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pareigos::create([
            'name' => 'Administratorius',
        ]);

        pareigos::create([
            'name' => 'Instruktorius',
        ]);

        pareigos::create([
            'name' => 'Darbuotojas',
        ]);
    }
}
