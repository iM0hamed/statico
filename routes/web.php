<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect(route('admin.dashboard'));
    }

    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my-team', [App\Http\Controllers\HomeController::class, 'index'])->name('my.team');

Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.loginForm');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::get('/teams', [\App\Http\Controllers\TeamController::class, 'index'])->name('teams');
    Route::post('/teams', [\App\Http\Controllers\TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/create', [\App\Http\Controllers\TeamController::class, 'create'])->name('teams.create');
    Route::get('/teams/{slug}', [\App\Http\Controllers\TeamController::class, 'show'])->name('teams.detail');
    Route::delete('/teams/{slug}', [\App\Http\Controllers\TeamController::class, 'destroy'])->name('teams.delete');
    Route::get('/teams/{slug}/setting', [\App\Http\Controllers\TeamController::class, 'setting'])->name('teams.setting');
    Route::put('/teams/{slug}/setting', [\App\Http\Controllers\TeamController::class, 'updateSetting'])->name('teams.setting.update');
    Route::get('/teams/{slug}/rosters-change', [\App\Http\Controllers\TeamController::class, 'roster'])->name('teams.roster');
    Route::put('/teams/{slug}/rosters-change', [\App\Http\Controllers\TeamController::class, 'updateRoster'])->name('teams.roster.update');

    Route::get('/players', [\App\Http\Controllers\PlayerController::class, 'index'])->name('players');
    Route::get('/players/create', [\App\Http\Controllers\PlayerController::class, 'create'])->name('players.create');
    Route::post('/players/store', [\App\Http\Controllers\PlayerController::class, 'store'])->name('players.store');
    Route::get('/players/{slug}', [\App\Http\Controllers\PlayerController::class, 'show'])->name('players.detail');
    Route::get('/players/{slug}/setting', [\App\Http\Controllers\PlayerController::class, 'setting'])->name('players.setting');
    Route::put('/players/{slug}/setting', [\App\Http\Controllers\PlayerController::class, 'update'])->name('players.setting.update');
    
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});