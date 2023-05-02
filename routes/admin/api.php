<?php

use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoundController;

//don't forget it has an admin prefix
require __DIR__ . '/auth.php';

Route::group(['middleware' => 'admin:sanctum', 'as' => 'admin.'], function () {
    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);
    //users
    Route::resource('users', UserController::class)->except(['show']);
    //teams
    Route::resource('teams', TeamController::class)->except(['show', 'create']);
    //roles
    Route::resource('roles', RoleController::class)->except(['show']);
    //rounds
    Route::resource('rounds', RoundController::class)->except(['show']);
    //settings
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});

//settings
Route::get('settings', [SettingController::class, 'retreve'])->name('settings.retreve');
