<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Publisher;
use App\Models\Genre;
use App\Http\Requests\GameRequest;
class GamesTest extends Controller
{
    public function index()
    {
        $games = auth()->user()->games()->with(['genre', 'publisher'])->get();
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('games', compact('games','publishers','genres'));
    }
    
    public function show(Game $game)
    {
        $game = Game::with(['genre', 'publisher'])->findOrFail($game->id);
        return view('games.info', compact('game'));
    }

    public function create(Game $game)
    {
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('games.create', compact('publishers','genres'));
    }
    public function store(GameRequest $request)
{
    $game = Game::firstOrCreate(
        ['name' => $request->name],          
        $request->validated()                  
    );

    auth()->user()->games()->syncWithoutDetaching([$game->id]);

    return redirect()->route('games.show', $game->id);
}

}
