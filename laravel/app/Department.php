<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function device() {
	    return $this->hasMany('App\Device', 'department_id', 'id');
    }
}
