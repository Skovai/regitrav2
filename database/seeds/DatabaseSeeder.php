<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KategorijaTableSeeder::class);
        $this->call(DarbuotojasTableSeeder::class);
        $this->call(KlientasTableSeeder::class);

        
    }
}
