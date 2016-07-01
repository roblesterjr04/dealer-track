<?php

namespace App;

define('API_KEY', '3w75b8yv4t65sjsn36uwx6jy');

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public function location() {
	    return $this->hasMany('App\Location', 'vehicle_id', 'id');
    }
    
    public function save(array $options = Array()) {
	    
	    $vin = $this->vin;
	    $key = API_KEY;
	    $url = "https://api.edmunds.com/api/vehicle/v2/vins/$vin?fmt=json&api_key=$key";
	    $data = file_get_contents($url);
	    $data = json_decode($data);
	    $this->make = $data->make->name;
	    $this->model = $data->model->name;
	    $this->engine_cyl = $data->engine->cylinder;
	    $this->engine_hp = $data->engine->horsepower;
	    $this->engine_type = $data->engine->type;
	    $this->engine_fuel = $data->engine->fuelType;
	    $this->engine_size = $data->engine->size;
	    $this->engine_config = $data->engine->configuration;
	    $this->edmunds_id = $data->make->id;
	    if (count($data->years)) {
		    $this->year = $data->years[0]->year;
		    if (count($data->years[0]->styles)) {
			    $styleid = $data->years[0]->styles[0]->id;
			    $this->style_name = $data->years[0]->styles[0]->name;
			    $url = "https://api.edmunds.com/v1/api/vehiclephoto/service/findphotosbystyleid?styleId=$styleid&fmt=json&api_key=$key";
			    $images = file_get_contents($url);
			    $images = json_decode($images);
			    if (count($images)) {
				    foreach ($images as $imagedata) {
					    if ($imagedata->subType == 'exterior') {
						    if (count($imagedata->photoSrcs)) {
							    $image = $imagedata->photoSrcs[0];
						    	$image = "https://media.ed.edmunds-media.com$image";
								$this->img_url = $image;
							}
					    }
				    }
				    
			    }
		    }
	    }
	    
	    return parent::save();
    }
}
