<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::create([
            'name'=> 'CD Projekt',
            'Country' => 'Poland',
        ]);
        Publisher::create([
            'name'=> 'Atlus',
            'Country' => 'Japan',
        ]);
        Publisher::create([
            'name'=> 'Square Enix',
            'Country' => 'Japan',
        ]);
        Publisher::create([
            'name' => 'Bandai Namco',
            'Country' => 'Japan',
        ]);
        Publisher::create([
            'name' => 'Capcom',
            'Country' => 'Japan',
        ]);
        Publisher::create([
            'name' => 'Polychroma Games',
            'Country' => 'Italy',
        ]);

        Publisher::create([
            'name' => 'SHIFT UP',
            'Country' => 'South Korea',
        ]);

        Publisher::create([
            'name'=> 'Team Cherry',
            'Country' => 'Australia',
        ]);

    }
}
