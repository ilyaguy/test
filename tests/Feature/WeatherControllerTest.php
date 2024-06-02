<?php

namespace Tests\Unit;

use App\Http\Controllers\WeatherController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class WeatherControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_weather_empty_request(): void
    {
        $this->assertEquals(null, (new WeatherController())->index());
    }

    public function test_weather_with_full_data(): void
    {
        $x = "";
        // $x = ()->index('weather');
        $l = new WeatherController();
        Log::debug(__METHOD__, [$l]);

        Log::debug(__METHOD__, [$x]);

        $this->assertEquals('{"coord":{"lon":33.0333,"lat":34.6853},"weather":[{"id":800,"main":"Clear","description":"clear sky","icon":"01n"}],"base":"stations","main":{"temp":293.12,"feels_like":293.34,"temp_min":293.12,"temp_max":293.19,"pressure":1012,"humidity":83},"visibility":10000,"wind":{"speed":2.06,"deg":270},"clouds":{"all":0},"dt":1715713622,"sys":{"type":1,"id":6381,"country":"CY","sunrise":1715654740,"sunset":1715704975},"timezone":10800,"id":146384,"name":"Limassol","cod":200}', $x);
    }

}
