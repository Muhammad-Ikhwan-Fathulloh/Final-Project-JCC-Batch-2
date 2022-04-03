<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'genre_id' => '1',
                'name' => 'Action',
            ],
            [
                'genre_id' => '2',
                'name' => 'Comedy',
            ],
            [
                'genre_id' => '3',
                'name' => 'Drama',
            ],
            [
                'genre_id' => '4',
                'name' => 'Fantasy',
            ],
            [
                'genre_id' => '5',
                'name' => 'Horror',
            ],
            [
                'genre_id' => '6',
                'name' => 'Mystery',
            ],
            [
                'genre_id' => '7',
                'name' => 'Romance',
            ],
            [
                'genre_id' => '8',
                'name' => 'Thriller',
            ],
        ]);
    }
}
