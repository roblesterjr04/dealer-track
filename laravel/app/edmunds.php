<?php

namespace App;

class edmunds
{
	private $api_key = '3w75b8yv4t65sjsn36uwx6jy';
	private $vin_url;
	private $img_url;
	
	
	
	public function __construct($vin) {
		$this->vin_url = "https://api.edmunds.com/api/vehicle/v2/vins/$vin?fmt=json&api_key={$this->api_key}";
	}
	
	public function image($styleid) {
		$url = "https://api.edmunds.com/v1/api/vehiclephoto/service/findphotosbystyleid?styleId=$styleid&fmt=json&api_key={$this->api_key}";
	    $images = file_get_contents($url);
	    $images = json_decode($images);
	    if (count($images)) {
		    foreach ($images as $imagedata) {
			    if ($imagedata->subType == 'exterior') {
				    if (count($imagedata->photoSrcs)) {
					    $image = $imagedata->photoSrcs[0];
				    	$image = "https://media.ed.edmunds-media.com$image";
						return $image;
					}
			    }
		    }
	    }
	    return false;
	}
	
	public function retrieve() {
		$data = file_get_contents($this->vin_url);
	    $data = json_decode($data);
	    
	    return $data;
	}
}
