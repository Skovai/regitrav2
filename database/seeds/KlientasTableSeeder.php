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
            'FK_Darbuotojas' => 1,
            'FK_Pirisijungimo_id' => 1
        ]);




    }
}
