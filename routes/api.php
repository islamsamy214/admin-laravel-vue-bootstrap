<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoundController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::group(['as' => 'api.'], function () {
    // rounds
    Route::get('rounds', [RoundController::class, 'index'])->name('rounds.index');
    Route::put('rounds/{round}', [RoundController::class, 'update'])->name('rounds.update');
    // roles
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    // teams
    Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('presentation/{team}', [TeamController::class, 'getPresentation'])->name('presentation.show');
    Route::put('presentation/{team}', [TeamController::class, 'updatePresentation'])->name('presentation.update');
});
