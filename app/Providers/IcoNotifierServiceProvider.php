<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ico\Services\Exchanges\CoinMarketCap;
use App\Ico\Services\Contracts\ExchangesInterface;


class IcoNotifierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind('App\Ico\Services\Contracts\ExchangeInterface', function($app){
            return new CoinMarketCap();
        });
    }
}
