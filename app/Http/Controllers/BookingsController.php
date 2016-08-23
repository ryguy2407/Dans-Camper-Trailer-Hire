<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Camper;
use App\Calendar\Calendar;
use Illuminate\Http\Request;

use App\Http\Requests;

class BookingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['page']]);
        $this->middleware('auth.admin', ['except' => ['show', 'page']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param calendar $calendar
     *
     */
    public function index()
    {
        $bookings = Booking::approved()->get();
        $calendar = new Calendar();
        return view('bookings.index')
            ->with('bookings', $bookings)
            ->with('calendar', $calendar);
    }

    public function page()
    {
        $campers = Camper::all();
        return view('bookings.page')->with('campers', $campers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
