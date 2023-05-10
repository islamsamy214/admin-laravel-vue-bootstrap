<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\TeamController;
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoundController;
=======
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HomePageController;
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

//don't forget it has an admin prefix
require __DIR__ . '/auth.php';

<<<<<<< HEAD
Route::group(['middleware' => 'admin:sanctum', 'as' => 'admin.'], function () {
    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);
    //users
    Route::resource('users', UserController::class)->except(['show']);
    //teams
    Route::resource('teams', TeamController::class)->except(['show']);
    //roles
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('roles/{role}/flush', [RoleController::class, 'flushRate']);
    Route::get('roles/flush', [RoleController::class, 'flushRates']);
    //rounds
    Route::resource('rounds', RoundController::class)->except(['show']);
    //settings
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
=======
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
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
});

//settings
Route::get('settings', [SettingController::class, 'retreve'])->name('settings.retreve');
