<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Usuário 1',
                'email' => 'usuario1@gmail.com',
                'image' => 'user1.png',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Usuário 2',
                'email' => 'usuario2@gmail.com',
                'image' => 'user2.png',
                'password' => Hash::make('12345678'),
            ]
        ]);
    }
}
