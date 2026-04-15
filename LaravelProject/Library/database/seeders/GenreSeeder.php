<?php

namespace Database\Seeders;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name'=> 'Action',
            'subgenre' => 'Adventure',
        ]);
        Genre::create([
            'name'=> 'Fantasy',
            'subgenre' => 'RPG',
        ]);
        Genre::create([
            'name'=> 'Adventure RPG',
            'subgenre' => 'Casual',
        ]);

        Genre::create([
            'name' => 'Puzzle',
            'subgenre' => 'Indie',
        ]);
        Genre::create([
            'name' => 'Visual Novel',
            'subgenre' => 'Indie',
        ]);
        Genre::create([
            'name' => 'Action RPG',
            'subgenre' => 'Open World',
        ]);
        Genre::create([
            'name' => 'Metroidvania',
            'subgenre' => 'Indie',
        ]);

    }
}
