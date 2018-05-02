<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ico\Services\Exchanges\CoinMarketCap;

class CoinMarketToken extends Model
{

	protected $table = "coin_market_tokens";

    protected $fillable = self::fillable();

    public function exchange()
    {
    	$this->belongsTo(CoinMarketCap::class);
    }

    private static fillable()
    {
    	return [
    		'id', 
    		'name', 
    		'symbol', 
    		'rank', 
    		'price_usd', 
    		'price_btc', 
    		'24h_volume_usd', 
    		'market_cap_usd', 
    		'available_supply', 
    		'total_supply', 
    		'max_supply', 
    		'percent_change_1h', 
    		'percent_change_24h', 
    		'percent_change_7d',
    		'last_update'
    	];
    }
}
