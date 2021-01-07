<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PasswordController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\UserController;
use App\Http\Resources\Password;

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



Route::middleware('auth:sanctum')->group(function () {
    //users
    Route::apiResource('/users', UserController::class);
    Route::post('/users/{user}/ban', [UserController::class, 'ban'])->middleware('can:isAdmin');
    Route::post('/users/{user}/unban', [UserController::class, 'unban'])->middleware('can:isAdmin');
    Route::get('/user', [UserController::class, 'loggedInUser']);

    // passwords
    Route::get('passwords-all', [PasswordController::class, 'allPasswords']);
    Route::post('add-password', [PasswordController::class, 'addPasswordToUser' ]);
    Route::post('remove-password', [PasswordController::class, 'removePasswordFromUser' ]);
    Route::apiResource('passwords', PasswordController::class );
    Route::get('passwords/{password}/decrypt', [PasswordController::class, 'decrypt'])->middleware('track');
    // activity
    Route::apiResource('activity', ActivityController::class);
    
    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
});