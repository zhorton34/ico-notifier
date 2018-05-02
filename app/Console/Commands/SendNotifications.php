<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TokenSearcher;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NotifyUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Users Of New ICO If One Exists';

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
     * @return mixed
     */
    public function handle()
    {
        
        
    }
}
