<?php

use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\RoleController;

//don't forget it has an admin prefix
require __DIR__ . '/auth.php';

Route::group(['middleware' => 'admin:sanctum', 'as' => 'admin.'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    //users
    Route::resource('users', UserController::class)->except(['show']);
    //teams
    Route::resource('teams', TeamController::class)->except(['show', 'create']);
    //roles
    Route::resource('roles', RoleController::class)->except(['show']);

    //settings
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});

//settings
Route::get('settings', [SettingController::class, 'retreve'])->name('settings.retreve');
