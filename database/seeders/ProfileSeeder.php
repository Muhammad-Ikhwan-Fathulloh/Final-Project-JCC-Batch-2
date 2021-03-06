<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'user_id' => '1',
                'age' => '20',
                'bio' => 'Jabarcoding Camp',
                'address' => 'Bandung',
            ],
            [
                'user_id' => '2',
                'age' => '20',
                'bio' => 'Jabarcoding Camp',
                'address' => 'Bandung',
            ],
            [
                'user_id' => '3',
                'age' => '20',
                'bio' => 'Jabarcoding Camp',
                'address' => 'Bandung',
            ],
        ]);
    }
}
