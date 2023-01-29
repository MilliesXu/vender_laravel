<?php

use App\Http\Controllers\Login\CreateLoginController;
use App\Http\Controllers\Login\StoreLoginController;
use App\Http\Controllers\Logout\StoreLogoutController;
use App\Http\Controllers\Register\CreateRegisterController;
use App\Http\Controllers\Register\StoreRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', CreateRegisterController::class)->middleware('guest');
Route::post('/', StoreRegisterController::class)->middleware('guest');
Route::post('/logout', StoreLogoutController::class)->middleware('auth');
Route::get('/login', CreateLoginController::class)->name('login')->middleware('guest');
Route::post('/login', StoreLoginController::class)->middleware('guest');
