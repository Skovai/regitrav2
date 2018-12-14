<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Darbuotojas as darboutojas;

class DarbuotojasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        darboutojas::create([
            'pareigos' => 1,
            'vardas' => 'Admin',
            'pavarde' => 'Admin',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 20',
            'telefonas' => '862118573',
            'e_pastas' => 'Admin@Admin.com',
            'asmens_kodas' => 33309240064,
            'gimimo_data' => Carbon::create('2000','01','01'),
            'FK_Pirisijungimo_id' => 1
        ]);
    }
}
