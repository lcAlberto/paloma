<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farms')->insert([
            'name' => 'Fazenda 1'
        ]);

        $user = User::find('1');
        $user->farm_id = 1;
        $user->save();
    }
}
