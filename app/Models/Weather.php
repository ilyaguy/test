<?php

namespace App\Models;

use App\Library\OpenWeatherMap;
use App\Models\Location;
use App\Models\Weather;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Weather extends Model
{
    protected $fillable = [
        'location_id',
        'info',
    ];

    public function locations(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function loadMap(OpenWeatherMap $map, Location $location)
    {
        $this->info = $map->getWeather($location);
        $this->location_id = $location->id;
        return $this;
    }
}
