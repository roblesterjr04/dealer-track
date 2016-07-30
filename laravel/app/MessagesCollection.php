<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Auth;
use DB;

class MessagesCollection extends Collection
{
    
    public function count() {
	    $userid = Auth::user()->id;
	    $count = DB::table('messages')->where(['read'=>0, 'user_id'=>$userid])->count();
	    return $count;
    }
    
}
