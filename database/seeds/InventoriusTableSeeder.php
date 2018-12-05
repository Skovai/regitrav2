<?php

use Illuminate\Database\Seeder;
use App\Inventorius as inventorius;

class InventoriusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        inventorius::create([
        	'pavadinimas' => 'Stalas',
            'serijos_numeris' => 100000,
            'darbuotojas_id' => 1,
        ]);

        inventorius::create([
        	'pavadinimas' => 'Stalas',
            'serijos_numeris' => 200000,
            'darbuotojas_id' => 1,
        ]);

        inventorius::create([
        	'pavadinimas' => 'Stalas',
            'serijos_numeris' => 300000,
            'darbuotojas_id' => 1,
        ]);
    }
}
