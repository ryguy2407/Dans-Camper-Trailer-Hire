<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function campers()
    {
	    return $this->belongsToMany('App\Camper');
    }
}
