<?php

use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;

//don't forget it has an admin prefix
require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth:sanctum', 'as' => 'admin.'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    //users
    Route::resource('users', UserController::class)->except(['show', 'create']);
    Route::resource('teams', TeamController::class)->except(['show', 'create']);

    //settings
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});

//settings
Route::get('settings', [SettingController::class, 'retreve'])->name('settings.retreve');
