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

    public function create(OpenWeatherMap $map, string $locationName)
    {
        $loadData = $map->getDirect($locationName);
        $this->city = $loadData[0]['name'] . ', '. $loadData[0]['country'];
        $this->lat = $loadData[0]['lat'];
        $this->lon = $loadData[0]['lon'];
        Log::info("Added new location to map", [$this->city, $this->lat, $this->lon]);
        return $this;
    }
}
