<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public function location() {
	    return $this->hasMany('App\Location', 'vehicle_id', 'id');
    }
    
    public function save(array $options = Array()) {
	    
	    $vin = $this->vin;
	    
	    $ed = new Edmunds($vin);
	    $data = $ed->data();
	    
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
			    $this->img_url = $ed->image($styleid);
		    }
	    }
	    
	    return parent::save();
    }
}
