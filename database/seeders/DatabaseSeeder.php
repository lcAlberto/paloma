<?php

namespace Database\Seeders;

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
        $this->call(UserTableSeeder::class);
        $this->call(FarmTableSeeder::class);

        $this->call(CountryTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(BrazilianCitiesTableSeeder::class);
        $this->call(AdressTableSeeder::class);

        $this->call(AnimalTableSeeder::class);
        $this->call(BreedingTableSeeder::class);
    }
}
