<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Requestl;

Route::get('/weather/{id}', [WeatherController::class, 'show']);

// Route::get('/', function () {
//     return view('welcome');
// });
