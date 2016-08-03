<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
	/*
	 * Get the camper that belongs to this rate entry
	 */
	public function camper()
	{
		return $this->belongsTo('App\Camper');
	}
}
