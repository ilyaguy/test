<?php

namespace App\Http\Controllers;

use App\Library\OpenWeatherMap;
use App\Models\Location;
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
        $location = Location::first();
        $map = new Weather();
        $row = $map->loadMap(new OpenWeatherMap(), $location);

        Log::debug(__METHOD__, [$row, $location]);
        if (!$row) {
            return null;
        }

        return $row->info;
    }
}
