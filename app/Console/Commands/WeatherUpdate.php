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
        $owm = new OpenWeatherMap();
        foreach (Location::all() as $location) {
            try {
                $weather = $owm->getWeather($location, '');
                Log::info('Update weather info', [$location, $weather]);
                $weatherData = new Weather;
                $weatherData->location_id = $location->id;
                $weatherData->info = $weather; // json_encode($weather);
                $weatherData->save();
            } catch (Execute $ex) {
                Log::error($ex->getMessage());
            }
        }
    }
}
