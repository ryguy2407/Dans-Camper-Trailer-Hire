<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camper extends Model
{
	/*
	 * Get the rates that belong to the camper
	 */
	public function rates()
	{
		return $this->hasMany('App\Rate');
	}

	/*
	 * Get all the images related to the camper
	 */
	public function images()
	{
		return $this->hasMany('App\CamperImage')->orderBy('image_order');
	}
}
