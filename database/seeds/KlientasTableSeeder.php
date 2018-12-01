<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Klientas as klientas;

class KlientasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        klientas::create([
            'vardas' => 'Jonas',
            'pavarde' => 'Jonaitis',
            'asmens_kodas' => 33309240064,
            'tel_nr' => '862118573',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 20',
            'gimimo_data' => Carbon::parse('2000-01-01'),
            'e_pastas' => 'Jonas@Jonaitis.com',
            'FK_Darbuotojas' => 1
        ]);

        klientas::create([
            'vardas' => 'Petras',
            'pavarde' => 'Petraitis',
            'asmens_kodas' => 33388240064,
            'tel_nr' => '862117573',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 21',
            'gimimo_data' => Carbon::parse('2000-01-01'),
            'e_pastas' => 'Petras@Petraitis.com',
            'FK_Darbuotojas' => 1
        ]);

        klientas::create([
            'vardas' => 'Antanas',
            'pavarde' => 'Antanaitis',
            'asmens_kodas' => 33388560064,
            'tel_nr' => '862113573',
            'miestas' => 'Kaunas',
            'adresas' => 'Studentu g. 10',
            'gimimo_data' => Carbon::parse('2000-01-01'),
            'e_pastas' => 'Petras@Petraitis.com',
            'FK_Darbuotojas' => 2
        ]);




    }
}
