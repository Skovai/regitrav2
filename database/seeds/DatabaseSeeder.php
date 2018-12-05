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
        $this->call(DarbuotojasTableSeeder::class);
        $this->call(KlientasTableSeeder::class);
        $this->call(InventoriusTableSeeder::class);
    }
}
