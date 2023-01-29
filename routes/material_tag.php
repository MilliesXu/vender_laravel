<?php

use App\Http\Controllers\MaterialTag\StoreMaterialTagController;
use App\Http\Controllers\MaterialTag\DeleteMaterialTagController;

Route::post('/{material}/', StoreMaterialTagController::class)->middleware('auth');
Route::delete('/{material}/{material_tag}', DeleteMaterialTagController::class)->middleware('auth');
