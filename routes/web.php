<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Requestl;

Route::get('/', [WeatherController::class, 'index']);
