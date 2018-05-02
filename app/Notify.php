<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    
    protected $table = 'notifiers';
    
    protected $fillable = [
    	'symbol', 'email', 'preico', 'source', 'notes'
    ]; 


    public function scopeFor($query, $email, $symbol)
    {

    	return $query->where('email', $email)->where('symbol', $symbol);

    }

   
    public function scopeOff($query)
    {

    	return $query->where('notify', 0);

    }

    public function user()
    {

    	return belongsTo('App\User');
    	
    }


}
