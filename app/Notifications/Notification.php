<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Notification as Notify;

class Notification {

	public function __construct()
	{
		$this->date = Carbon::now();
	}

	public function check($bookings)
	{
		return array_filter($bookings, function($bookings) {
			$diff = $this->date->diffInDays(Carbon::parse($bookings['pickup_date']), false);	
			if($diff > 0 && $diff <= 7) {
				return true;
			}
		});

	}

	public function save($result)
	{
		foreach($result as $res) {

			$notify = Notify::where('booking_id', $res['id'])->first();
			if(count($notify)) {
				$notify->notification = $res['pickup_date'];
				$notify->active = 1;
				$notify->booking_id = $res['id'];
				$notify->day_count = Carbon::parse($res['pickup_date'])->diffForHumans(Carbon::now(), true);
				$notify->save();
			}
			if(! count($notify)) {
				Notify::create([
					'notification' => $res['pickup_date'],
					'active' => 1,
					'booking_id' => $res['id'],
					'day_count' => Carbon::parse($res['pickup_date'])->diffForHumans(Carbon::now(), true)
				]);
			}
		}
	}

}