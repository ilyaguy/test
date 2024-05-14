<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = Weather::orderBy('location_id', 'desc')->orderBy('id', 'desc')->first();

        return $row->info;
    }
}
