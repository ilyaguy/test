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
        if (count($row->info) < 1) {
            Log::error('No data imported');
            return "No data loaded";
        }

        return $row->info;
    }
}
