<?php

use App\Http\Controllers\Order\CreateOrderController;
use App\Http\Controllers\Order\IndexOrderController;

Route::get('/', IndexOrderController::class)->middleware('auth');
Route::get('/create', CreateOrderController::class)->middleware('auth');
