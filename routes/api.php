<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PasswordController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\UserController;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    //users
    Route::apiResource('/users', UserController::class);

    // passwords
    Route::apiResource('passwords', PasswordController::class );
    Route::get('passwords/{password}/decrypt', [PasswordController::class, 'decrypt'])->middleware('track');
    // activity
    Route::apiResource('activity', ActivityController::class);
    
    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
});