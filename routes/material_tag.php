<?php

Route::post('/{material}/', \App\Http\Controllers\MaterialTag\StoreMaterialTagController::class)->middleware('auth');
