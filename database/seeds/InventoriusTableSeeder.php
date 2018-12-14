<?php

use Illuminate\Database\Seeder;
use App\Inventorius as Inventorius;

class InventoriusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventorius::create([
          'pavadinimas' => 'stalas',
          'serijos_numeris' => 'STA564',
          'darbuotojas_id' => 1
        ]);
    }
}
