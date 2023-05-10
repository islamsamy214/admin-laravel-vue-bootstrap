<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Http\Request;

Route::group(['as' => 'admin.'], function () {
=======

Route::group(['middleware' => 'guest', 'as' => 'admin.'], function () {
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

<<<<<<< HEAD
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
=======
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

<<<<<<< HEAD
Route::group(['middleware' => 'admin:sanctum', 'as' => 'admin.'], function () {
    // auth user
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');
    
=======
Route::group(['middleware' => 'auth:sanctum', 'as' => 'admin.'], function () {
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
