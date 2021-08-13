<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class ProjectInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $string = "

  _____                      _______             _    _                _____           _
 |_   _|                    |__   __|           | |  (_)              / ____|         | |
   | |  ___ ___ _   _  ___     | |_ __ __ _  ___| | ___ _ __   __ _  | (___  _   _ ___| |_ ___ _ __ ___
   | | / __/ __| | | |/ _ \    | | '__/ _` |/ __| |/ / | '_ \ / _` |  \___ \| | | / __| __/ _ \ '_ ` _ \
  _| |_\__ \__ \ |_| |  __/    | | | | (_| | (__|   <| | | | | (_| |  ____) | |_| \__ \ ||  __/ | | | | |
 |_____|___/___/\__,_|\___|    |_|_|  \__,_|\___|_|\_\_|_| |_|\__, | |_____/ \__, |___/\__\___|_| |_| |_|
                                                               __/ |          __/ |
                                                              |___/          |___/
        ";

        $this->info($string);

        Artisan::call('migrate:fresh', array('--seed' => true));
        $this->info(Artisan::output());
        Artisan::call('module:seed');
        $this->info(Artisan::output());
    }
}
