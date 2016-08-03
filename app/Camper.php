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
}
