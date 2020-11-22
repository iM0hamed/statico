<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('/teams', [\App\Http\Controllers\api\v1\TeamController::class, 'index'])->name('api.teams');
    Route::post('/teams', [\App\Http\Controllers\api\v1\TeamController::class, 'store'])->name('api.teams.store');
    Route::get('/teams/{slug}', [\App\Http\Controllers\api\v1\TeamController::class, 'show'])->name('api.teams.show');
    Route::put('/teams/{slug}', [\App\Http\Controllers\api\v1\TeamController::class, 'setting'])->name('api.teams.setting');
});
