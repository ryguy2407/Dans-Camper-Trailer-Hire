@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>BOOKINGS AREA</h1>
        </div>
    </div>

    <div class="container content">

        <div class="row">
            <div class="columns twelve text-center">
                <h2>Confirmed Bookings Calendar</h2>
                {!! $calendar->build_calendar(8, 2016, $bookings) !!}
            </div>
        </div>

        <div class="row">
            <div class="columns twelve">
                <h2>Pending Bookings</h2>
                <ul class="pendingBookings">
                    @foreach($pending as $booking)
                        <li class="pendingBooking">
                            <p><strong>Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}</p>
                            <p><strong>Camper:</strong> {{ $booking->campers->first()->camper_title }}</p>
                            <p><strong>Dates Requested:</strong> {{ $booking->pickup_date }} - {{ $booking->dropoff_date }}</p>
                            <a style="margin: 20px 0;display: inline-block;" href="{{ route('bookings.show', ['id' => $booking->id]) }}" class="button button-primary">VIEW THIS BOOKING REQUEST</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection