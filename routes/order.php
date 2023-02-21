<?php

use App\Http\Controllers\Order\CreateOrderController;
use App\Http\Controllers\Order\IndexOrderController;
use App\Http\Controllers\Order\StoreOrderController;

Route::get('/', IndexOrderController::class)->middleware('auth');
Route::get('/create', CreateOrderController::class)->middleware('auth');
Route::post('/store', StoreOrderController::class)->middleware('auth');
