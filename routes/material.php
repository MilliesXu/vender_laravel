<?php

use App\Http\Controllers\Material\CreateMaterialController;
use App\Http\Controllers\Material\DeleteMaterialController;
use App\Http\Controllers\Material\EditMaterialController;
use App\Http\Controllers\Material\IndexMaterialController;
use App\Http\Controllers\Material\ShowMaterialController;
use App\Http\Controllers\Material\StoreMaterialController;
use App\Http\Controllers\Material\UpdateMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexMaterialController::class)->middleware('auth');
Route::get('/create', CreateMaterialController::class)->middleware('auth');
Route::post('/store', StoreMaterialController::class)->middleware('auth');
Route::get('/{material}', ShowMaterialController::class)->middleware('auth');
Route::get('/{material}/edit', EditMaterialController::class)->middleware('auth');
Route::put('/{material}/update', UpdateMaterialController::class)->middleware('auth');
Route::delete('/{material}/delete', DeleteMaterialController::class)->middleware('auth');
