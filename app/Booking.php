<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Booking extends Model
{
	use SoftDeletes;
	use Searchable;

	protected $guarded = ['id'];

    public function campers()
    {
	    return $this->belongsToMany('App\Camper');
    }

	public function notes()
	{
		return $this->hasMany('App\Note');
	}

	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}

	public function scopePending($query)
	{
		return $query->where('approved', 0);
	}

	public function status($status)
	{
		if($status) {
			return 'Yes';
		}
		return 'No';
	}
}
