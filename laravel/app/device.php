<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
	public $activation;
	
    public function save(array $options = Array()) {
	    
	    if (isset($options['new'])) {
	    
		    $this->guid = $this->uid();
		    $this->pairing_code = $this->code();
	    
	    }
	    
	    return parent::save();
    }
    
    public function code() {
	    return rand(pow(10, 3), pow(10, 4)-1);
    }
    
    public function uid() {
	    return uniqid("TMP_");
    }
    
    public function activation() {
	    $obj = new \stdClass();
	    $obj->device = $this->guid;
	    $obj->id = $this->id;
	    $obj->url = 'https://dealer-track:8443/';
	    return base64_encode(json_encode($obj));
    }    
}
