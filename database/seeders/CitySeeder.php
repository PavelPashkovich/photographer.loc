<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Brest',
                'slug' => 'brest',
            ],
            [
                'name' => 'Vitebsk',
                'slug' => 'vitebsk',
            ],
            [
                'name' => 'Gomel',
                'slug' => 'gomel',
            ],
            [
                'name' => 'Grodno',
                'slug' => 'grodno',
            ],
            [
                'name' => 'Minsk',
                'slug' => 'minsk',
            ],
            [
                'name' => 'Mogilev',
                'slug' => 'mogilev',
            ],
        ]);
    }
}
