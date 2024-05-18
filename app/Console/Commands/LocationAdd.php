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
        $location = new Location();
        $location->create($this->argument('location'));
    }
}
