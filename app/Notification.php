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
}
