<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $guarded = ['id'];

    public function campers()
    {
	    return $this->belongsToMany('App\Camper');
    }

	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}
}
