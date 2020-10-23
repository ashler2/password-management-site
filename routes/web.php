<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [PasswordController::class, 'index'])->name('home');

// Route::middleware('auth')->group(function () {
//     Route::resource('/passwords',PasswordController::class);

// });
Route::get('/{any}', [PasswordController::class, 'index'])->where('any', '.*');
