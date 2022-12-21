<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\HourController;
use App\Http\Controllers\api\v1\UserController;
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

Route::group(['prefix' => '/v1', 'middleware' => 'auth:sanctum'], function () {
    Route::put('login', [AuthController::class, 'login']);
    Route::post('/user', [UserController::class, 'create']);
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/hour', [HourController::class, 'create']);
    Route::get('hour', [HourController::class, 'index']);
});
