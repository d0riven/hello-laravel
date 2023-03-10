<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', [\App\Http\Controllers\IndexController::class, 'show']);
Route::get('/sample/{id}', [\App\Http\Controllers\IndexController::class, 'showId']);
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class);
