<?php

namespace App\Console\Commands;

use App\Models\Application;
use App\Services\Ping;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class PingApplications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping the servers';

    public $applications;

    public function __construct(
        public Ping $ping = new Ping(),
    ){
        parent::__construct();
        $this->applications = Application::query()
                                    ->select('id','name', 'url', 'ping_monitor')
                                    ->whereNotNull('ping_monitor')->get();
    }

    public function handle()
    {
        if ($this->thereAreNoApplicationsToMonitor()){
            return $this->info('No applications to monitor');
        }

        foreach ($this->applications as $application)
        {
            $response = $this->ping->pingServer($application->url);

            \App\Models\Ping::create(Arr::add($response, 'application_id', $application->id));

            $this->info($application->name . " - Ping : " . $response['ping']);
        }
    }

    public function thereAreNoApplicationsToMonitor()
    {
        return $this->applications->count() === 0;
    }
}
