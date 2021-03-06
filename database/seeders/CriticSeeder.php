<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('critics')->insert([
            [
                'user_id' => '1',
                'movie_id' => '1',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
            [
                'user_id' => '2',
                'movie_id' => '2',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
            [
                'user_id' => '3',
                'movie_id' => '3',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
            [
                'user_id' => '1',
                'movie_id' => '7',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
            [
                'user_id' => '2',
                'movie_id' => '8',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
            [
                'user_id' => '3',
                'movie_id' => '9',
                'content' => 'lorem ipsum sir dolor amet',
                'point' => '90',
            ],
        ]);
    }
}
