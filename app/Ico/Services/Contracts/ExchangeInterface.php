<?php

namespace App\Ico\Services\Contracts;


Interface ExchangeInterface
{
	/* api endpoint to hit */
	public function url();
	
	/* raw data */
	public function data();	

	/* list of public tickers */
	public function tickers();
}