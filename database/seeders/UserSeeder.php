<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => 'Pavel Pashkovich',
            'email' => 'pashkovich.pavel@gmail.com',
            'password' => env('ADMIN_PASSWORD'),
            'city_id' => 5,
            'role_id' => 1,
        ]);
    }
}
