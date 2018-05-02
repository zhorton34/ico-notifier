<?php 

namespace App\Ico\Services\Exchanges;

use App\CoinMarketToken;
use App\Ico\Services\Contracts\ExchangeInterface;



class CoinMarketCap implements ExchangeInterface
{
	

	private $url = "https://api.coinmarketcap.com/v1/ticker/?limit=0";

	/*
	 * List of public tickers 
	 */
	public function tickers()
	{

		foreach($this->data() as $data)
		{
			$tickers[] = $data->symbol;
		}
		return $tickers;
	}

	/*
	 * Get the data from api in php format 
	 */
	public function data()
	{
		
		return json_decode(file_get_contents($this->url));
	
	}

	/*
	 * Get the url for this exchange
	 */
	public function url()
	{

		return $this->url;

	}


	/* 
	 * Tokens That CoinMarketCap Owns
	 */ 
	public function tokens()
	{
		$this->hasMany('App\CoinMarketToken');
	}


}