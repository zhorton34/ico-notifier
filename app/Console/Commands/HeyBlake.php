<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\HeyBlake as HeyBlakeMail;
use Mail;

class HeyBlake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hey:blake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say Hi To Blake';

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
        $mail = new HeyBlakeMail();
        Mail::to('sendtoBlakeHiggins22@gmail.com')->send($mail->from('yourboizho99@gmail.com'));

    }
}
