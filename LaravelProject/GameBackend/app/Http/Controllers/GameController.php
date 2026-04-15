<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;
use App\Http\Requests\GameRequest;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {
        // los datos llegan como props al componente Vue directamente
        return Inertia::render('Games/Index', [
            'games'      => auth()->user()->games()->with(['genre', 'publisher'])->get(),
            'genres'     => Genre::all(),
            'publishers' => Publisher::all(),
        ]);
    }

    public function show(Game $game)
    {
        return Inertia::render('Games/Show', [
            'game' => $game->load(['genre', 'publisher']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Games/Create', [
            'genres'     => Genre::all(),
            'publishers' => Publisher::all(),
        ]);
    }

    public function store(GameRequest $request)
    {
        $game = Game::firstOrCreate(
            ['name' => $request->validated()['name']],
            $request->validated()
        );

        auth()->user()->games()->syncWithoutDetaching([$game->id]);

        return redirect()->route('games.show', $game->id);
    }
}