<?php

namespace App;

use App\MessagesCollection;
use Illuminate\Database\Eloquent\Model;

define('TZOFFSET', 3);

class message extends Model
{
    public function user() {
	    return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function from() {
	    return $this->belongsTo('App\User', 'from_id', 'id');
    }
    
    public function newCollection(array $models = []) {
	    return new MessagesCollection($models);
    }
    
    public function howlong ()
	{
		$time = strtotime($this->created_at);
		
		$time = time() - $time - (TZOFFSET * 60 * 60); // to get the time since that moment
	    $time = ($time<1)? 1 : $time;
	    $tokens = array (
	        31536000 => 'year',
	        2592000 => 'month',
	        604800 => 'week',
	        86400 => 'day',
	        3600 => 'hour',
	        60 => 'minute',
	        1 => 'second'
	    );
	
	    foreach ($tokens as $unit => $text) {
	        if ($time < $unit) continue;
	        $numberOfUnits = floor($time / $unit);
	        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	    }
	    
	    	
	}
	
	
}
