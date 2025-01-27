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
            [
                'name' => 'Estância',
                'created_at' => now(),
            ],
            [
                'name' => 'Fazenda 2',
                'created_at' => now(),
            ],
        ]);

        $user1 = User::find('1');
        $user1->farm_id = 1;
        $user1->save();

        $user2 = User::find('2');
        $user2->farm_id = 1;
        $user2->save();
    }
}
