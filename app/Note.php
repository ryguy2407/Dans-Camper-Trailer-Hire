<?php

namespace App;
use Carbon;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['note', 'booking_id'];

    public function booking()
    {
	    return $this->belongsTo('App\Booking');
    }

	public function getCreatedAtAttribute($date)
	{
		return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M, Y');
	}
}
