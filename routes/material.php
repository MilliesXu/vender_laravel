<?php

use App\Http\Controllers\Material\CreateMaterialController;
use App\Http\Controllers\Material\IndexMaterialController;
use App\Http\Controllers\Material\StoreMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexMaterialController::class);
Route::get('/create', CreateMaterialController::class);
Route::post('/', StoreMaterialController::class);