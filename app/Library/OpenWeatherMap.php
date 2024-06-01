<?php

namespace App\Library;

use App\Models\Location;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenWeatherMap
{
    public function __construct()
    {
        $this->url = env('OWM_URL');
        $this->key = env('OWM_APPIDA');
    }

    public function getDirect(string $location)
    {
        return ($this->callApi('geo/1.0/direct', 'q=' . $location));
    }

    public function getWeather(Location $location)
    {
        return $this->callApi('data/2.5/weather', 'lat='.$location->lat.'&lon='.$location->lon);
    }

    private function callApi($method, $data)
    {
        return Http::acceptJson()->get($this->url . $method . '?appid=' . $this->key . '&' . $data);
    }
}
