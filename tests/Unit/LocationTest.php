<?php

namespace Tests\Unit;

use App\Library\OpenWeatherMap;
use App\Models\Location;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    public function test_check_if_location_is_empty(): void
    {
        $location = new Location();
        $this->assertEquals('', $location->city);
    }

    public function test_check_with_empty_data(): void
    {
        $location = null;
        $this->assertEquals('', $location);
    }

    public function test_check_if_location_is_completed(): void
    {
        $location = new Location();
        $data = $location->create(new OpenWeatherMap(), "Limassol, Cyprus");
        $this->assertEquals('Limassol, CY', $data->city);
    }
}
