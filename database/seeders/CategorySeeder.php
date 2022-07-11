<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Landscape',
                'slug' => 'landscape',
            ],
            [
                'name' => 'Portrait',
                'slug' => 'portrait',
            ],
            [
                'name' => 'Kids',
                'slug' => 'kids',
            ],
            [
                'name' => 'Wedding',
                'slug' => 'wedding',
            ],
            [
                'name' => 'Macro',
                'slug' => 'macro',
            ],
            [
                'name' => 'Nature',
                'slug' => 'nature',
            ],
            [
                'name' => 'City / Architecture',
                'slug' => 'city-architecture',
            ],
            [
                'name' => 'Street / Reportage',
                'slug' => 'street-reportage',
            ],
            [
                'name' => 'Family portrait',
                'slug' => 'family-portrait',
            ],
            [
                'name' => 'Amimals',
                'slug' => 'animals',
            ],
            [
                'name' => 'Still life',
                'slug' => 'still-life',
            ],
            [
                'name' => 'Black and white',
                'slug' => 'black-and-white',
            ],
            [
                'name' => 'Sport',
                'slug' => 'sport',
            ],
            [
                'name' => 'Night',
                'slug' => 'night',
            ],
            [
                'name' => 'Film',
                'slug' => 'film',
            ],
        ]);
    }
}
