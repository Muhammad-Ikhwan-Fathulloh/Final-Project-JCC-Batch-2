<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\MovieSeeder;
use Database\Seeders\CastSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CriticSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call(UserSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(CastSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CriticSeeder::class);
    }
}
