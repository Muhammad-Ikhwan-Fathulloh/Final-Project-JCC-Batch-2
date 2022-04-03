<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

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
                'name' => 'Aldi Wahyudi',
                'username' => 'Aldi23',
                'email' => 'aldiwahyudi1223@gmail.com',
                'password' => bcrypt('password'),
                'img' => 'aldi.png',
            ],
            [
                'name' => 'Dimas',
                'username' => 'Dimas12',
                'email' => 'dimas@gmail.com',
                'password' => bcrypt('password'),
                'img' => 'dimas.png',
            ],
            [
                'name' => 'M. Ikhwan',
                'username' => 'Ikhwan12',
                'email' => 'ikhwan@gmail.com',
                'password' => bcrypt('password'),
                'img' => 'ikhwan.png',
            ],


        ]);
    }
}
