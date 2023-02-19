<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->middleware('auth');

Route::prefix('material')->group(base_path('/routes/material.php'));
Route::prefix('user')->group(base_path('routes/user.php'));
Route::prefix('tag')->group(base_path('routes/tag.php'));
Route::prefix('material_tag')->group(base_path('routes/material_tag.php'));
Route::prefix('order')->group(base_path('routes/order.php'));
