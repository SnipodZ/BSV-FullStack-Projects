<?php

use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ContactController;


Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
});

require __DIR__.'/settings.php';

// rutas de juegos — protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('games', GameController::class);
    Route::get('/contact',  [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
});