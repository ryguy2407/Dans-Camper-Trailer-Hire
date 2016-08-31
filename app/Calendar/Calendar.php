<?php namespace App\Calendar;

use Carbon\Carbon;

class Calendar {

	function build_calendar($month, $year, $bookings) {

		$this->bookingDates = [];

		foreach($bookings as $booking) {
			$this->bookingDates[] = [
				'pickup_date' => $booking->pickup_date,
				'dropoff_date' => $booking->dropoff_date,
				'camper_title' => $booking->campers->first()->camper_title,
				'camper_slug' => $booking->campers->first()->camper_slug,
				'url' => route('bookings.show', ['booking' => $booking->id])
			];
		}

		$daysOfWeek = array('S','M','T','W','T','F','S');
		$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
		$numberDays = date('t',$firstDayOfMonth);
		// Retrieve some information about the first day of the
		// month in question.
		$dateComponents = getdate($firstDayOfMonth);
		// What is the name of the month in question?
		$monthName = $dateComponents['month'];
		// What is the index value (0-6) of the first day of the
		// month in question.
		$dayOfWeek = $dateComponents['wday'];
		// Create the table tag opener and day headers
		$calendar = "<table class='bookingsCalendar'>";
		$calendar .= "<h5 class='open-sans'>$monthName $year</h5>";
		$calendar .= "<tr>";

		// Create the calendar headers
		foreach($daysOfWeek as $day) {
			$calendar .= "<th class='header'>$day</th>";
		}

		// Create the rest of the calendar
		// Initiate the day counter, starting with the 1st.
		$currentDay = 1;
		$calendar .= "</tr><tr>";

		// The variable $dayOfWeek is used to
		// ensure that the calendar
		// display consists of exactly 7 columns.
		if ($dayOfWeek > 0) {
			$calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
		}

		$month = str_pad($month, 2, "0", STR_PAD_LEFT);

		while ($currentDay <= $numberDays) {
			// Seventh column (Saturday) reached. Start a new row.
			if ($dayOfWeek == 7) {
				$dayOfWeek = 0;
				$calendar .= "</tr><tr>";
			}

			$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
			$date = "$year-$month-$currentDayRel";
			$calendar .= "<td class='day' rel='$date'>".$currentDay;

			//Generate event html if date is matched in bookings array
			if(count($this->bookingDates) >= 1) {
				$eventsArray = $this->generateEvents( $this->bookingDates );
				foreach ( $eventsArray as $event ) {
					if ( in_array( Carbon::parse( $date )->timestamp, $event ) ) {
						$calendar .= "<a href=" . $event['url'] . "><p class=" . $event['camper_slug'] . ">" . $event['camper_title'] . "</p></a>";
					}
				}
			}
//
			$calendar .= "</td>";
			$currentDay++;
			$dayOfWeek++;
		}

		if ($dayOfWeek != 7) {
			$remainingDays = 7 - $dayOfWeek;
			$calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
		}

		$calendar .= "</tr>";
		$calendar .= "</table>";

		return $calendar;
	}

	private function generateEvents($bookings)
	{
		$this->result = [];
		array_filter($bookings, function($bookings){
			$bookingLength = $this->returnTotalDays($bookings['pickup_date'], $bookings['dropoff_date']);
			$this->result[] = $this->createBookingsArray($bookingLength, $bookings);
		});
		return $this->result;
	}

	private function returnTotalDays($pickup, $dropoff)
	{
		$pickup = Carbon::parse($pickup);
		$dropoff = Carbon::parse($dropoff);
		return $pickup->diffInDays($dropoff);
	}

	private function createBookingsArray($bookingLength, $booking)
	{
		for ($x = 0; $x <= $bookingLength; $x++) {
			array_push($booking, Carbon::parse($booking['pickup_date'])->addDay($x)->timestamp);
		}
		return $booking;
	}
}