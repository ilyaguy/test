<?php

namespace App\Console\Commands;

use App\Models\Location;
use App\Models\Weather;
use App\Library\OpenWeatherMap;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class WeatherUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:weather-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = [];
        $owm = new OpenWeatherMap();
        foreach (Location::all() as $location) {
            $result[] = $location->updateWeather($owm);
        }
        return $result;
    }
}
