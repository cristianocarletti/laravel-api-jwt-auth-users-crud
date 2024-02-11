<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::prefix('user')->group(function () {

        Route::get('index', [UserController::class, 'index']);
        Route::post('store', [UserController::class, 'store']);
        Route::get('show/{id}', [UserController::class, 'show']);
        Route::post('update', [UserController::class, 'update']);
        Route::delete('destroy/{id}', [UserController::class, 'destroy']);
    });
});
