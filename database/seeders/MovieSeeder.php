<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'movie_title' => 'Inception',
                'duration' => 148,
                'release_date' => Carbon::parse('2010-07-16'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'The Matrix',
                'duration' => 136,
                'release_date' => Carbon::parse('1999-03-31'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Interstellar',
                'duration' => 169,
                'release_date' => Carbon::parse('2014-11-07'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'The Dark Knight',
                'duration' => 152,
                'release_date' => Carbon::parse('2008-07-18'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Avengers: Endgame',
                'duration' => 181,
                'release_date' => Carbon::parse('2019-04-26'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'No Time to Die',
                'duration' => 163,
                'release_date' => Carbon::parse('2021-09-30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Top Gun: Maverick',
                'duration' => 131,
                'release_date' => Carbon::parse('2022-05-27'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Spider-Man: No Way Home',
                'duration' => 148,
                'release_date' => Carbon::parse('2021-12-17'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
