<?php

namespace App\Console\Commands;

use Dotenv\Dotenv;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectStart extends Command implements Isolatable, ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:project-start {user*} {--queue} {--isolation}';

    protected $name = 'project-start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $project    = $this->ask('What is the Project name');
        $database   = $this->ask('What database name');
        dd($project, $database);
//        $this->callSilently('config:cache');
//        info($this->argument('user')."Command execution Ok");
    }
}
