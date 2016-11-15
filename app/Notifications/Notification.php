<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Notification as Notify;

class Notification {

	public function check($bookings)
	{
		return array_filter($bookings, function($bookings) {
			$date = Carbon::now();
			$diff = $date->diffInDays(Carbon::parse($bookings['pickup_date']), false);	
			if($diff <= 7) {
				return true;
			}
		});

	}

	public function save($result)
	{
		foreach($result as $res) {
			Notify::create([
				'notification' => $res['notification'],
				'active' => 1
			]);
		}
	}

}