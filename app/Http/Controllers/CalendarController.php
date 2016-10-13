<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('auth.admin');
	}

	public function show()
	{
		return view('calendar.show');
	}
}
