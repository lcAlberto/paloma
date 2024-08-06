<?php

namespace Database\Seeders;

use App\Enums\AnimalClassEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            [
                'id' => 1,
                'name' => 'Filó',
                'code' => '2330',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::COW_LACTATING,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Gerso',
                'code' => '23',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Paloma',
                'code' => '25',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::HE_CALVES,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 1,
                'father_id' => 2,
                'farm_id' => 1
            ],

            [
                'id' => 4,
                'name' => 'Sinfra',
                'code' => '2335',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::COW_LACTATING,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'Boi bandido',
                'code' => '203',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 2
            ],
            [
                'id' => 6,
                'name' => 'Mocha',
                'code' => '250',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::HE_CALVES,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 4,
                'father_id' => 5,
                'farm_id' => 2
            ],
        ]);
    }
}
