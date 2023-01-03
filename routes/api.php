<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;
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

Route::prefix('/users')->group(function () {

    Route::apiResource('/', UserController::class)->only(['store']);

    Route::middleware('verified')->group(function () {
        Route::post('/login', [UserAuthController::class, 'store']);
    });
});

if (Features::enabled(Features::emailVerification())) {
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::get(
        '/email/verify/{id}/{hash}',
        [VerifyUserEmailController::class, '__invoke']
    )
        ->middleware(['signed', 'throttle:' . $verificationLimiter])
        ->name('user.verification.verify');
}
