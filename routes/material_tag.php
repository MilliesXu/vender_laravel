<?php

use App\Http\Controllers\MaterialTag\StoreMaterialTagController;
use App\Http\Controllers\MaterialTag\DeleteMaterialTagController;

Route::post('/{material}/', StoreMaterialTagController::class)->middleware('auth');
Route::delete('/{material}/{materialTag}', DeleteMaterialTagController::class)->middleware('auth');
