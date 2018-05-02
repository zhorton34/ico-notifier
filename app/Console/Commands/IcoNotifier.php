<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Ico\Services\Contracts\ExchangeInterface;


class IcoNotifier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check If Users Need To Be Notified and Notify Them If They Do';

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
     * Check all user notifier symbols agains public token symbols
     *
     * @param ExchangeInterface Grabs the public token symbols
     *
     * @return mixed
     */
    public function handle(ExchangeInterface $exchange)
    {
        foreach(User::all() as $user) 
        {
            /* grab notifiers where user has notify turned on */
            $notifiers = self::notifiers($user);
            if(empty($notifiers)) continue;

            /* grab the symbols for the notifiers that are public */
            $symbols = self::symbols($exchange->tickers(), $notifiers);

            /* email users */
            self::email($user, $notifiers, $symbols);
        
            /* check if user has added their phone info */
            self::phone($user, $notifiers, $symbols);
        }
    }



    /**
     * Compare Public Token Symbols Agains User Notifier Symbols
     *
     * @param  Public Token Symbols (pulled from api's)
     * @param  User Notifier Symbols (pulled from database)
     *
     * @return array
     */
    private static function symbols($publicSymbols, $userSymbols)
    {   
        return array_unique(array_intersect($publicSymbols, array_column($userSymbols, 'symbol')));
    }
    /** 
     * Check for user phone
     *
     * @param User $user
     * @param Notifiers data
     * @param Symbols array
     *
     * @return mixed
     */
    private static function phone(User $user, $notifiers, $symbols)
    {
        $phone = $user->phone(); 
        if(!is_null($phone)) $phone = $phone->first(); 
        else return;        
        self::text($phone, $symbols);
    }


    /**
     * Send Sms/Text Message To User For Each Symbol 
     *
     * @param $phone data
     * @param $symbols to notify user for
     *
     * @return void
     *
     */
    private static function text($phone, $symbols)
    {
        foreach($symbols as $symbol)
        {
            mail($phone->sms(), $symbol, "$symbol is now public", self::header());
        }
    }


    /**
     * Check for user Notifiers
     *
     * @param User $user
     *
     * @return Notifiers : false
     */
    private static function notifiers(User $user)
    {
        
        return $user->notifiers()->where('notify', 1)->get()->all();
    
    }


    /**
     *
     * Email Users If They Have a Notifier That is Public 
     *
     * @param User $user
     * @param Notifiers data
     * @param Symbols array
     *
     * @return mix
     */

    private static function email(User $user, $notifiers, $symbols)
    {
        
        foreach($symbols as $symbol)
        {
            mail($user->email, $symbol, "$symbol is now public", self::header());
        }

    }

    private static function header()
    {
        $header  = "From:zak@zaktechtips.com \r\n";
        $header .= "Cc:zak@zaktechtips.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        return $header;
    }

}
