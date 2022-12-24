<?php

use App\Http\Controllers\Tag\CreateTagController;
use App\Http\Controllers\Tag\DeleteTagController;
use App\Http\Controllers\Tag\EditTagController;
use App\Http\Controllers\Tag\IndexTagController;
use App\Http\Controllers\Tag\ShowTagController;
use App\Http\Controllers\Tag\StoreTagController;
use App\Http\Controllers\Tag\UpdateTagController;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexTagController::class)->middleware('auth');
Route::get('/create', CreateTagController::class)->middleware('auth');
Route::post('/store', StoreTagController::class)->middleware('auth');
Route::get('/{tag}', ShowTagController::class)->middleware('auth');
Route::get('/{tag}/edit', EditTagController::class)->middleware('auth');
Route::put('/{tag}/update', UpdateTagController::class)->middleware('auth');
Route::delete('/{tag}/delete', DeleteTagController::class)->middleware('auth');
