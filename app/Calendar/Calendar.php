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
				'url' => route('camper.booking.show', ['camper' => $booking->campers->first()->id, 'booking' => $booking->id])
			];
		}

		// Create array containing abbreviations of days of week.
		$daysOfWeek = array('S','M','T','W','T','F','S');

		// What is the first day of the month in question?
		$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

		// How many days does this month contain?
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
		$calendar .= "<h4>$monthName $year</h4>";
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

			//Run a couple of loops to check the date of the returned event
			//against the date that the calendar is on, if it matches
			//loop through the events part of the array and print
			//out the camper name and the slug for the class
			//Here is where we will run a check on the event array and add it
			//to the day cell.

			$parsedEvents = $this->parseEvents( $this->bookingDates, $date );
			if($parsedEvents) {
				foreach ( $parsedEvents as $event ) {
					foreach ( $event as $event ) {
						if(Carbon::parse($date)->timestamp == Carbon::parse($event['date'])->timestamp) {
							$calendar .= "<a href=".$event['url']."><p class=".$event['camper_slug'].">".$event['camper_title']."</p></a>";
						}
					}
				}
			}
			$calendar .= "</td>";

			// Increment counters

			$currentDay++;
			$dayOfWeek++;

		}



		// Complete the row of the last week in month, if necessary

		if ($dayOfWeek != 7) {

			$remainingDays = 7 - $dayOfWeek;
			$calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";

		}

		$calendar .= "</tr>";

		$calendar .= "</table>";

		return $calendar;

	}

	private function parseEvents($events)
	{
		$dateArray = $this->getBookingDatesArray($events);
		return $dateArray;
	}

	private function getBookingDatesArray($events)
	{
		//This function calculates how long the booking is for and creates
		//an array of days consecutively and returns the array result.
		$dateArray = [];

		$i = 0;
		foreach($events as $event) {
			$pickup = Carbon::parse($event['pickup_date']);
			$dropoff = Carbon::parse($event['dropoff_date']);
			$days = $pickup->diffInDays($dropoff);

			for ($x = 0; $x <= $days; $x++) {
				$dateArray[$x][$i]['date'] = Carbon::parse($event['pickup_date'])->addDay($x);
				$dateArray[$x][$i]['camper_title'] = $event['camper_title'];
				$dateArray[$x][$i]['camper_slug'] = $event['camper_slug'];
				$dateArray[$x][$i]['url'] = $event['url'];
			}
			$i++;
		}
		return $dateArray;
	}


}