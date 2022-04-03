<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_id' => '1',
                'movie_id' => '1',
                'cast_id' => '1',
                'name' => 'Pemeran',
            ],
            [
                'role_id' => '2',
                'movie_id' => '1',
                'cast_id' => '2',
                'name' => 'Pemeran',
            ],
            [
                'role_id' => '3',
                'movie_id' => '1',
                'cast_id' => '3',
                'name' => 'Pemeran',
            ],
        ]);
    }
}
