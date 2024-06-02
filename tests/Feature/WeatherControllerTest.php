<?php

namespace Tests\Unit;

use App\Models\Weather;
use App\Models\Location;
use App\Http\Controllers\WeatherController;
use App\Library\OpenWeatherMap;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_weather_empty_request(): void
    {
        $this->assertEquals(null, (new WeatherController())->index());
    }

    public function test_weather_with_full_data(): void
    {
        $location = new Location();
        $location->create(new OpenWeatherMap(), 'Limassol,CY')->save();
        $weather = new Weather();
        $weather->loadMap(new OpenWeatherMap(), $location)->save();

        $weatherController = new WeatherController();
        $result = $weatherController->index();

        $this->assertEquals(200, $result['cod']);
    }

}
