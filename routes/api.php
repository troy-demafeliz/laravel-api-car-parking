<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth;
use \App\Http\Controllers\Api\V1\VehicleController;
use \App\Http\Controllers\Api\V1\ZoneController;
use \App\Http\Controllers\Api\V1\ParkingController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('api')
    ->prefix('v1')
    ->group(function () {
        Route::post('auth/register', Auth\RegisterController::class);
        Route::post('auth/login', Auth\LoginController::class);
        Route::post('auth/logout', Auth\LogoutController::class);
    });

Route::middleware('auth:sanctum')
    ->prefix('v1')
    ->group(function () {
        Route::get('profile', [Auth\ProfileController::class, 'show']);
        Route::put('profile', [Auth\ProfileController::class, 'update']);
        Route::put('password', Auth\PasswordUpdateController::class);
        Route::apiResource('vehicles', VehicleController::class);
        Route::get('zones', [ZoneController::class, 'index']);
        Route::post('parkings/start', [ParkingController::class, 'start']);
        Route::get('parkings/{parking}', [ParkingController::class, 'show'])->whereNumber('parking');
        Route::put('parkings/{parking}', [ParkingController::class, 'stop'])->whereNumber('parking');
    });
