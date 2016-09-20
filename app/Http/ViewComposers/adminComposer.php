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
		$view->with('bookings', $this->booking->where(['deposit' => 1])->get());
		$view->with('pending', $this->booking->where('deposit', 0)->paginate(2));
		$view->with('trashed', $this->booking->onlyTrashed()->get());
		$view->with('calendar', app('calendar'));
	}

}