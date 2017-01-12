<?php

namespace App\Notifications;

use App\Notification as Notify;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Notification {

	public function __construct()
	{
		$this->date = Carbon::now();
	}

	//GET Bookings where the conditions are met that we want to notify for
	public function check($bookings)
	{
		$notificationsArray = [];

		$notificationsArray['pickup'] = $this->filterBookings($bookings, 'pickup_date');
		$notificationsArray['dropoff'] = $this->filterBookings($bookings, 'dropoff_date');

		return $notificationsArray;
	}

	private function filterBookings($bookings, $index)
	{
		return array_filter($bookings, function($bookings) use ($index) {
			$notifyDate = $this->date->diffInDays(Carbon::parse($bookings[$index]), false);
			if($notifyDate > 0 && $notifyDate <= 7) {
				return true;
			}
		});
	}

	//Save the bookings to the DB 
	public function save($result)
	{
		foreach($result['pickup'] as $pickup) {
			$notify = Notify::where('booking_id', $pickup['id'])->where('notification_type', 'pickup')->first();
			if(count($notify)) {
				$notify->notification = $pickup['pickup_date'];
				$notify->active = 1;
				$notify->booking_id = $pickup['id'];
				$notify->notification_type = 'pickup';
				$notify->day_count = Carbon::parse($pickup['pickup_date'])->diffForHumans(Carbon::now(), true);
				$notify->save();
			}
			if(! count($notify)) {
				Notify::create([
					'notification' => $pickup['pickup_date'],
					'active' => 1,
					'booking_id' => $pickup['id'],
					'notification_type' => 'pickup',
					'day_count' => Carbon::parse($pickup['pickup_date'])->diffForHumans(Carbon::now(), true)
				]);
			}
		}

		foreach($result['dropoff'] as $dropoff) {
			$notify = Notify::where('booking_id', $dropoff['id'])->where('notification_type', 'dropoff')->first();
			if(count($notify)) {
				$notify->notification = $dropoff['dropoff_date'];
				$notify->active = 1;
				$notify->booking_id = $dropoff['id'];
				$notify->day_count = Carbon::parse($dropoff['dropoff_date'])->diffForHumans(Carbon::now(), true);
				$notify->notification_type = 'dropoff';
				$notify->save();
			}
			if(! count($notify)) {
				Notify::create([
					'notification' => $dropoff['dropoff_date'],
					'active' => 1,
					'booking_id' => $dropoff['id'],
					'notification_type' => 'dropoff',
					'day_count' => Carbon::parse($dropoff['pickup_date'])->diffForHumans(Carbon::now(), true)
				]);
			}
		}
	}

	//Purge any old bookings that aren't required anymore
	public function purge($bookings)
	{
		$purge = array_filter($bookings, function($bookings) {
			$pickup = $this->date->diffInDays(Carbon::parse($bookings['pickup_date']), false);	
			$dropoff = $this->date->diffInDays(Carbon::parse($bookings['dropoff_date']), false);	
			if($pickup < 0 || $dropoff < 0) {
				return true;
			}
		});
		foreach ($purge as $p) {
			Notify::where('booking_id',$p['id'])->delete();
		}
		
	}

}