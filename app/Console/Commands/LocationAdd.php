<?php

namespace App\Console\Commands;

use App\Models\Location;
use App\Library\OpenWeatherMap;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LocationAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:location-add {location}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new location';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $owm = new OpenWeatherMap();
        $data = $owm->getDirect($this->argument('location'))->json()[0];

        $location = new Location();
        $location->city = $data['name'] . ', '. $data['country'];
        $location->lat = $data['lat'];
        $location->lon = $data['lon'];
        $location->save();
        Log::info("Added new location to map", [$location->city, $location->lat, $location->lon]);
    }
}
