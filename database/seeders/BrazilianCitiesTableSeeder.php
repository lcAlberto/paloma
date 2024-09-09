<?php

namespace Database\Seeders;

use App\Models\Models\Address\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrazilianCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('cities')->truncate();
        

        DB::table('cities')->insert([
            [
                'id' => mt_rand(1, 200),
                'name' => 'Guarapuava',
                'state_id' => 26,
                'state_code' => 'PR',
                'country_id' => 1,
                'country_code' => 'BR',
                'latitude' => '-25.39048000',
                'longitude' => '-51.46541000',
                'created_at' => '2019-10-05 18:35:06',
                'updated_at' => '2019-10-05 18:35:06',
                'flag' => 1,
                'wikiDataId' => 'Q326354',
            ],
            [
                'id' => mt_rand(1, 200),
                'name' => 'Araguainha',
                'state_id' => 15,
                'state_code' => 'MT',
                'country_id' => 1,
                'country_code' => 'BR',
                'latitude' => '-16.78427000',
                'longitude' => '-53.07981000',
                'created_at' => '2019-10-05 18:34:56',
                'updated_at' => '2019-10-05 18:34:56',
                'flag' => 1,
                'wikiDataId' => 'Q1792161',
            ],
            [
                'id' => mt_rand(1, 200),
                'name' => 'Bilac',
                'state_id' => 25,
                'state_code' => 'SP',
                'country_id' => 1,
                'country_code' => 'BR',
                'latitude' => '-21.42076000',
                'longitude' => '-50.47862000',
                'created_at' => '2019-10-05 18:34:58',
                'updated_at' => '2019-10-05 18:34:58',
                'flag' => 1,
                'wikiDataId' => 'Q1754582',
            ],
            [
                'id' => mt_rand(1, 200),
                'name' => 'Biquinhas',
                'state_id' => 2,
                'state_code' => 'MG',
                'country_id' => 1,
                'country_code' => 'BR',
                'latitude' => '-18.76231000',
                'longitude' => '-45.54853000',
                'created_at' => '2019-10-05 18:34:58',
                'updated_at' => '2019-10-05 18:34:58',
                'flag' => 1,
                'wikiDataId' => 'Q1754582',
            ],
            [
                'id' => mt_rand(1, 200),
                'name' => 'Birigui',
                'state_id' => 25,
                'state_code' => 'SP',
                'country_id' => 1,
                'country_code' => 'BR',
                'latitude' => '-21.28861000',
                'longitude' => '-50.34000000',
                'created_at' => '2019-10-05 18:34:58',
                'updated_at' => '2019-10-05 18:34:58',
                'flag' => 1,
                'wikiDataId' => 'Q963648',
            ]
        ]);
    }
}
