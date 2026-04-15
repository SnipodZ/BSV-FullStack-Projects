<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'name'=> 'Cyberpunk 2077',
            'description' => 'Cyberpunk 2077 is an open-world, action-adventure',
            'length' => 60.50,
            'release_date' => '2020-12-10',
            'genre_id' => 1,
            'publisher_id' => 1,
        ]);
        Game::create([
            'name'=> 'Persona 5',
            'description' => 'Persona 5 is a role-playing game developed by Atlus.',
            'length' => 100.00,
            'release_date' => '2016-09-15',
            'genre_id' => 2,
            'publisher_id' => 2,
        ]);
        Game::create([
            'name'=> 'The Witcher 3: Wild Hunt',
            'description' => 'The Witcher 3: Wild Hunt is an action role-playing game developed by CD Projekt.',
            'length' => 120.00,
            'release_date' => '2015-05-19',
            'genre_id' => 2,
            'publisher_id' => 1,
        ]);
    }
}
