<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name' => 'Pavel Pashkovich',
                'slug' => 'pavel-pashkovich',
                'email' => env('ADMIN_LOGIN'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'city_id' => 5,
                'role_id' => 1,
            ],
            [
                'name' => 'Andrey',
                'slug' => 'andrey',
                'email' => 'andrey@gmail.com',
                'password' => Hash::make(12345678),
                'city_id' => 1,
                'role_id' => 2,
            ],
            [
                'name' => 'Mark',
                'slug' => 'mark',
                'email' => 'mark@gmail.com',
                'password' => Hash::make(12345678),
                'city_id' => 2,
                'role_id' => 2,
            ],
            [
                'name' => 'Nasty',
                'slug' => 'nasty',
                'email' => 'nasty@gmail.com',
                'password' => Hash::make(12345678),
                'city_id' => 3,
                'role_id' => 2,
            ],
            [
                'name' => 'Tanya',
                'slug' => 'tanya',
                'email' => 'tania@gmail.com',
                'password' => Hash::make(12345678),
                'city_id' => 4,
                'role_id' => 2,
            ],
        ]);
    }
}
