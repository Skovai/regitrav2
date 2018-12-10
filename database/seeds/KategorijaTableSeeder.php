<?php

use Illuminate\Database\Seeder;
use App\Kategorija as kategorija;
class KategorijaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategorija::create([
            'name' => 'AM',
        ]);

        kategorija::create([
            'name' => 'A',
        ]);

        kategorija::create([
            'name' => 'A1',
        ]);

        kategorija::create([
            'name' => 'A2',
        ]);

        kategorija::create([
            'name' => 'B1',
        ]);

        kategorija::create([
            'name' => 'B',
        ]);

        kategorija::create([
            'name' => 'C1',
        ]);

        kategorija::create([
            'name' => 'C',
        ]);

        kategorija::create([
            'name' => 'D1',
        ]);

        kategorija::create([
            'name' => 'D',
        ]);

        kategorija::create([
            'name' => 'BE',
        ]);

        kategorija::create([
            'name' => 'C1E',
        ]);

        kategorija::create([
            'name' => 'CE',
        ]);

        kategorija::create([
            'name' => 'D1E',
        ]);

        kategorija::create([
            'name' => 'DE',
        ]);

        kategorija::create([
            'name' => 'T',
        ]);
    }
}
