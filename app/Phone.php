<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

	protected $table = 'phones';

	protected $fillable = ['number', 'company', 'completed'];

	public function scopeIncomplete($query) //Phone::incomplete()->where('id', '>=', 2)->get()
	{

		return $query->where('completed', 0);

	}

	public function scopeComplete($query) //Phone::complete()->where('company', 'sprint')->get()
	{

		return $query->where('completed', 1);

	}

	public function user()
	{

		return $this->belongsTo('App\User');
		
	}

	public function sms()
	{
		return $this->number . "@" . config("phone.companies.{$this->company}");
	}    
}
