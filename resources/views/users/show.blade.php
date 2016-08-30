@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Admin area</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns twelve">
                <h1>Hi {{ $user->name }} <a href="#"> <small style="font-size: 50%;">- edit</small></a></h1>
            </div>
        </div>

        <div class="row">
            @if($user->isAdmin())
                <div class="columns four">
                    <h4 class="open-sans"><strong>Pending Booking Requests</strong></h4>
                    <ul>
                        @foreach($pending as $booking)
                            <li>
                                <a href="#">{{ $booking->first_name }} {{ $booking->last_name }} - {{ $booking->campers->first()->camper_title }}</a>
                                <ul>
                                    <li>Pickup Date: {{ $booking->pickup_date }}</li>
                                    <li>Dropoff Date: {{ $booking->dropoff_date }}</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                    <hr>

                    <h4 class="open-sans"><strong>Create a new booking</strong></h4>
                    <a href="{{ route('bookings.create') }}" style="width: 100%;" class="button button-primary ajax">MAKE A BOOKING</a>

                </div>
                <div class="columns eight">
                    <h4 class="open-sans"><strong>Booking Calendar</strong></h4>
                    {!! $calendar->build_calendar(date('n'), date('Y'), $bookings) !!}
                </div>
            @endif
        </div>
    </div>

@endsection