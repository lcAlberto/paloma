<?php

namespace Database\Seeders;

use App\Models\Models\Address\Address;
use Illuminate\Database\Seeder;

class AdressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'farm_id' => 1,
            'country_id' => 1,
            'state_id' => 1,
            'city_id' => 1,
            'street' => 'Rua dezessete de Julho, 2012',
            'zipcode' => '85012-040',
        ]);
    }
}
