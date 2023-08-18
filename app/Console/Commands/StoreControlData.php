<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Control;
use App\Models\Monitoring;

class StoreControlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:control-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store control data every hour';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $monitoringData = Monitoring::latest()->first();

        if ($monitoringData) {
            $controlData = [
                'temperature' => $monitoringData->temperature,
                'turbidity' => $monitoringData->turbidity,
                'ph' => $monitoringData->ph,
                'dissolved_oxygen' => $monitoringData->dissolved_oxygen,
                'kualitas_air' => $monitoringData->kualitas_air,
                'sistem_kendali' => $monitoringData->sistem_kendali,
            ];

            Control::create($controlData);
        }
    }
}
