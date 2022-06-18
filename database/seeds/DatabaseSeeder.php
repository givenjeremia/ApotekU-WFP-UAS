<?php

// use ObatSeeder;
// use KategoriSeeder;
// use ObatPriceSeeder;
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
        // $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(ObatSeeder::class);
        $this->call(ObatPriceSeeder::class);
    }
}
