<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'movie_id' => '1',
                'genre_id' => '4',
                'title' => 'Hotel Transylvania: Transformania',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/8/8b/Hotel_Transylvania_Transformania.jpg',
            ],
            [
                'movie_id' => '2',
                'genre_id' => '6',
                'title' => 'Shattered',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/8/86/Shattered_film.jpg',
            ],
            [
                'movie_id' => '3',
                'genre_id' => '4',
                'title' => 'Turning Red',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/9/9e/Turning_Red_poster.jpg',
            ],
            [
                'movie_id' => '4',
                'genre_id' => '3',
                'title' => 'The Kings Daughter',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/c/ca/The_King%27s_Daughter_%282022_film%29.jpg',
            ],
            [
                'movie_id' => '5',
                'genre_id' => '5',
                'title' => 'Morbius',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/thumb/2/2f/Morbius_%28film%29_poster.jpg/324px-Morbius_%28film%29_poster.jpg',
            ],
            [
                'movie_id' => '6',
                'genre_id' => '6',
                'title' => 'The Lost City',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/e/ee/TheLostCityPoster.jpg',
            ],
            [
                'movie_id' => '7',
                'genre_id' => '3',
                'title' => 'Metal Lords',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/c/cd/Metal_Lords_Poster.jpg',
            ],
            [
                'movie_id' => '8',
                'genre_id' => '1',
                'title' => 'Fantastic Beasts: The Secrets of Dumbledore',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/3/34/Fantastic_Beasts-_The_Secrets_of_Dumbledore.png',
            ],
            [
                'movie_id' => '9',
                'genre_id' => '6',
                'title' => 'Polar Bear',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/6/62/Polar_Bear_film_poster.png',
            ],
            [
                'movie_id' => '10',
                'genre_id' => '6',
                'title' => 'Doctor Strange in the Multiverse of Madness',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/0/08/Doctor_Strange_in_the_Multiverse_of_Madness_poster.jpeg',
            ],
            [
                'movie_id' => '11',
                'genre_id' => '6',
                'title' => 'Chip n Dale: Rescue Rangers',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/4/46/Chip_n_Dale_Rescue_Rangers_Teaser_poster.jpg',
            ],
            [
                'movie_id' => '12',
                'genre_id' => '5',
                'title' => 'Men',
                'summary' => 'lorem ipsum sir dolor amet',
                'year' => '2022',
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/0/03/AlexGarlandMenPoster.jpg',
            ],
        ]);
    }
}
