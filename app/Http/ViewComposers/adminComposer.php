<?php

namespace App\Http\ViewComposers;

use App\Booking;
use Illuminate\View\View;

class adminComposer
{

	protected $booking;

	public function __construct(Booking $booking)
	{
		$this->booking = $booking;
	}

	public function compose(View $view)
	{
		$view->with('bookings', $this->booking->where('approved', 1)->get());
		$view->with('pending', $this->booking->where('approved', 0)->paginate(2));
		$view->with('trashed', $this->booking->onlyTrashed()->paginate(2));
		$view->with('calendar', app('calendar'));
	}

}