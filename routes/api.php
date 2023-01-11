<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

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

Route::prefix('/products')->group(function () {
    Route::apiResource('/', ProductController::class)->only(['index']);
});

Route::prefix('/users')->group(function () {
    Route::apiResource('/', UserController::class)->only(['store']);
});

if (Features::enabled(Features::emailVerification())) {
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::get(
        '/email/verify/{id}/{hash}',
        [VerifyEmailController::class, '__invoke']
    )
        ->middleware(['signed', 'throttle:' . $verificationLimiter])
        ->name('user.verification.verify');
}

Route::middleware('verified')->group(function () {
    Route::post('/login', [UserAuthController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [UserAuthController::class, 'me']);
    Route::post('/logout', [UserAuthController::class, 'destroy']);
});
