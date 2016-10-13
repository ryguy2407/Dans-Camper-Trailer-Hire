<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alerts:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs a notification update route to get new notifications';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
