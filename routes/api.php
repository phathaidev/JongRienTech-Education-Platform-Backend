<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login'])
        ->middleware('throttle:5, 1'); // rate limiting, 5 attempts per minute
    Route::resource('user', UserController::class)
        ->middleware('throttle:3, 1');
});
