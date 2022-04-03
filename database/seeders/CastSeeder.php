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
                'name' => 'Ikhwan',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
            [
                'name' => 'Aldi',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
            [
                'name' => 'Dimas',
                'age' => '20',
                'bio' => 'lorem ipsum sir dolor amet',
            ],
        ]);
    }
}
