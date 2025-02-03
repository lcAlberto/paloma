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
                'farm_id' => 1
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
                'farm_id' => 1
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
                'farm_id' => 1
            ],
            [
                'id' => 7,
                'name' => 'Ferdinando',
                'code' => '255',
                'breed' => 'Gir',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 1,
                'father_id' => 2,
                'farm_id' => 1
            ],
            [
                'id' => 8,
                'name' => 'Bela',
                'code' => '2331',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::COW_DRY,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ],
            [
                'id' => 9,
                'name' => 'Tucano',
                'code' => '2332',
                'breed' => 'Nelore',
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
                'id' => 10,
                'name' => 'Lua',
                'code' => '2333',
                'breed' => 'Gir',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::HEIFER,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 1,
                'father_id' => 7,
                'farm_id' => 1
            ],
            [
                'id' => 11,
                'name' => 'Sol',
                'code' => '2334',
                'breed' => 'Gir',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 1,
                'father_id' => 7,
                'farm_id' => 1
            ],
            [
                'id' => 12,
                'name' => 'Nina',
                'code' => '2344',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::COW_DRY,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ],
            [
                'id' => 13,
                'name' => 'Chico',
                'code' => '2336',
                'breed' => 'Nelore',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 3,
                'father_id' => 9,
                'farm_id' => 1
            ],
            [
                'id' => 14,
                'name' => 'Flor',
                'code' => '2337',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::HEIFER,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 3,
                'father_id' => 9,
                'farm_id' => 1
            ],
            [
                'id' => 15,
                'name' => 'Gaia',
                'code' => '2338',
                'breed' => 'Gir',
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
                'id' => 16,
                'name' => 'Zeus',
                'code' => '2339',
                'breed' => 'Nelore',
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
                'id' => 17,
                'name' => 'Hera',
                'code' => '2340',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::COW_DRY,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ],
            [
                'id' => 18,
                'name' => 'Ares',
                'code' => '2341',
                'breed' => 'Nelore',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => 15,
                'father_id' => 16,
                'farm_id' => 1
            ],
            [
                'id' => 19,
                'name' => 'Afrodite',
                'code' => '2342',
                'breed' => 'Jersey',
                'sex' => AnimalSexEnum::FEMEALE,
                'classification' => AnimalClassEnum::HEIFER,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => 16,
                'farm_id' => 1
            ],
            [
                'id' => 20,
                'name' => 'Poseidon',
                'code' => '2343',
                'breed' => 'Gir',
                'sex' => AnimalSexEnum::MALE,
                'classification' => AnimalClassEnum::BULL_REPRODUCTIVE,
                'status' => AnimalStatusEnum::ALIVE,
                'image' => null,
                'born_date' => Carbon::now(),
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1
            ]
        ]);
    }
}
