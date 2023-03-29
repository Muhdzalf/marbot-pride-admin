<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'phone_number' => '085156184234',
                'birth_date' => '2019/01/02',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
