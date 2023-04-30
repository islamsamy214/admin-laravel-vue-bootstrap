<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomePageController;

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

    //settings
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    //home page
    Route::group(['prefix' => 'home-page', 'as' => 'home-page.'], function () {
        Route::get('/', [HomePageController::class, 'index'])->name('index');
        Route::put('hero-section', [HomePageController::class, 'updateHeroSection'])->name('hero-section.update');
    });
});

//settings
Route::get('settings', [SettingController::class, 'retreve'])->name('settings.retreve');
