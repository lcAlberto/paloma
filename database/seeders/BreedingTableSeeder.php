<?php

namespace Database\Seeders;

use App\Enums\AnimalHeatChildbirthTypeEnum;
use App\Enums\AnimalHeatStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbom = new Carbon('10/09/2024');
        DB::table('breeding_records')->insert([
            [
                'id' => 1,
                'occurrence_date' => $carbom->format('Y-m-d H:m:s'),
                'coverage_date' => $carbom->format('Y-m-d H:m:s'),
                'date_birth_prediction' => $carbom->addDays(280)->format('Y-m-d H:m:s'),
                'date_birth' => null,
                'status' => AnimalHeatStatusEnum::PENDING,
                'cover_method' => AnimalHeatChildbirthTypeEnum::NATURAL,
                'female_id' => 1,
                'male_id' => 2,
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
