<?php

use App\Http\Controllers\Order\IndexOrderController;

Route::get('/', IndexOrderController::class)->middleware('auth');
