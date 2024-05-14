<?php

namespace App\Console\Commands;

use App\Jobs\WeatherUpdateJob;
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
        Log::info('WeatherUpdate');

    }
}
