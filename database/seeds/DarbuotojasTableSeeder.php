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
            'pareigos' => 'Instruktorius',
            'vardas' => 'Jonas',
            'pavarde' => 'Jonaitis',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 20',
            'telefonas' => '862118573',
            'e_pastas' => 'Jonas@Jonaitis.com',
            'asmens_kodas' => 33309240064,
            'gimimo_data' => Carbon::create('2000','01','01'),
        ]);

        darboutojas::create([
            'pareigos' => 'Darbuotojas',
            'vardas' => 'Tadas',
            'pavarde' => 'Tadaitis',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 50',
            'telefonas' => '862118579',
            'e_pastas' => 'Tadas@Tadaitis.com',
            'asmens_kodas' => 33309240069,
            'gimimo_data' => Carbon::create('2000','01','01'),
        ]);
    }
}
