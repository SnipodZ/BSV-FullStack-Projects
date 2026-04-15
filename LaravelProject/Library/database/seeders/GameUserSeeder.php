<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class GameUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $sopas  = User::where('email', 'soma.donoval@gmail.com')->first();
    $sopas2 = User::where('email', 'ylantao828@gmail.com')->first();
    $sopas3 = User::where('email', 'testemail@test.com')->first();

    // attach() inserta en la tabla pivote
    // syncWithoutDetaching() evita duplicados sin borrar los existentes
    $sopas->games()->syncWithoutDetaching([1, 2, 7]);
    $sopas2->games()->syncWithoutDetaching([3, 4, 8]);
    $sopas3->games()->syncWithoutDetaching([5, 6, 9]);
}
}
