<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ['id'];

    public function booking()
    {
    	return $this->belongsTo('App\Booking');
    }

    public function scopePickup($query)
	{
		return $query->where('notification_type', 'pickup');
	}

	public function scopeDropoff($query)
	{
		return $query->where('notification_type', 'dropoff');
	}
}
