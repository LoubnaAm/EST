<?php

use App\Http\Controllers\ExpertAuth\AuthenticatedSessionController;
use App\Http\Controllers\ExpertAuth\ConfirmablePasswordController;
use App\Http\Controllers\ExpertAuth\EmailVerificationNotificationController;
use App\Http\Controllers\ExpertAuth\EmailVerificationPromptController;
use App\Http\Controllers\ExpertAuth\NewPasswordController;
use App\Http\Controllers\ExpertAuth\PasswordController;
use App\Http\Controllers\ExpertAuth\PasswordResetLinkController;
use App\Http\Controllers\ExpertAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:expert')->group(function () {

    Route::get('expert/login', [AuthenticatedSessionController::class, 'create'])
                ->name('expert.login');

    Route::post('expert/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('expert/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('expert.password.request');

    Route::post('expert/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('expert.password.email');

    Route::get('expert/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('expert.password.reset');

    Route::post('expert/reset-password', [NewPasswordController::class, 'store'])
                ->name('expert.password.store');
});

Route::middleware('auth:expert')->group(function () {
    Route::get('expert/verify-email', EmailVerificationPromptController::class)
                ->name('expert.verification.notice');

    Route::get('expert/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('expert.verification.verify');

    Route::post('expert/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('expert.verification.send');

    Route::get('expert/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('expert.password.confirm');

    Route::post('expert/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('expert/password', [PasswordController::class, 'update'])->name('expert.password.update');

    Route::post('expert/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('expert.logout');
});
