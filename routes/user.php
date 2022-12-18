<?php

use App\Http\Controllers\Register\CreateRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', CreateRegisterController::class);