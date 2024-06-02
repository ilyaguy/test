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
        if (empty($location)) {
            return false;
        }
        $weather = new Weather();
        $row = $weather->loadMap(new OpenWeatherMap(),
                                $location);
        if (!$row) {
            return null;
        }

        return $row->info;
    }
}
