<?php

namespace App\Models;

use App\Library\OpenWeatherMap;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'lat',
        'lon',
    ];

    public function create($locationName)
    {
        try {
            $location = new Location();
            $owm = new OpenWeatherMap();
            $loadData = ($owm->getDirect($locationName))[0];
            $location->city = $loadData['name'] . ', '. $loadData['country'];
            $location->lat = $loadData['lat'];
            $location->lon = $loadData['lon'];
            $location->save();
            Log::info("Added new location to map", [$location->city, $location->lat, $location->lon]);
            return $location;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }
}
