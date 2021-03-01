<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Play\PlayController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('auth')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});


Route::prefix('plays')->group(function () {
    Route::get('', [PlayController::class, 'list']);

    Route::middleware('auth:api')->group(function () {
        Route::post('', [PlayController::class, 'create']);
        Route::prefix('{id}')->group(function () {
            Route::delete('', [PlayController::class, 'delete']);
        });
    });
});



