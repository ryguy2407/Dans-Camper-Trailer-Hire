<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Camper;
use App\User;
use App\Calendar\Calendar;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        $pending = Booking::pending()->get();
        $calendar = new Calendar();
        return view('bookings.index')
            ->with('bookings', $bookings)
            ->with('pending', $pending)
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
        return view('bookings.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookingRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( StoreBookingRequest $request )
    {
        $booking = Booking::create($request->except('camper_id'));
        $booking->campers()->attach([$request->get('camper_id')]);
        return redirect()->route('user.show', ['id' => Auth::user()->id])
            ->with('success', 'Booking was added it should appear in the pending bookings area');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        $user = User::find(Auth::user()->id);
        return view('bookings.show')->with('booking', $booking)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('bookings.admin.edit')->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBookingRequest|Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->except('camper_id'));
        $booking->campers()->sync([$request->get('camper_id')]);
        $booking->save();
        return redirect()->route('user.show', ['id' => Auth::user()->id])->with('success', 'Camper has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('user.show', ['id' => Auth::user()->id])->with('success', 'Booking has been archived');
    }

	/**
     * Restore the booking
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $booking = Booking::onlyTrashed()->where('id', $id);
        $booking->restore();
        return redirect()->route('user.show', ['id' => Auth::user()->id])->with('success', 'Booking has been restored');
    }
}
