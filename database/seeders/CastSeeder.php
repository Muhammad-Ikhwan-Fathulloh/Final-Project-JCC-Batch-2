<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('casts')->insert([
            [
                'cast_id' => '1',
                'name' => 'Ikhwan',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
            [
                'cast_id' => '2',
                'name' => 'Aldi',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
            [
                'cast_id' => '3',
                'name' => 'Dimas',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
        ]);
    }
}
