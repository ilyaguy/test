<?php

namespace Tests\Unit;

use App\Library\OpenWeatherMap;
use App\Models\Weather;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class WeatherTest extends TestCase
{
    use RefreshDatabase;

    public function test_check_if_location_is_completed(): void
    {
        $location = (new Location())->create(new OpenWeatherMap(), 'Limassol, CY');
        $weather = new Weather();
        $data = $weather->loadMap(new OpenWeatherMap(), $location)->info;
        $this->assertEquals('Limassol', $data['name']);
    }

}
