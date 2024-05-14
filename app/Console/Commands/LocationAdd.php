<?php

namespace App\Console\Commands;

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
        Log::info("Add new location to map");
        $owm = new OpenWeatherMap();
        $data = $owm->getDirect('Limassol,Cyprus')->json()[0];
        Log::debug('Location', [$data['name'], $data['state'], $data['country'], $data['lat'], $data['lon']]);

    }
}
