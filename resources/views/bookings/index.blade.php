@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>BOOKINGS</h1>
        </div>
    </div>

    <div class="container content">

        <div class="row">
            <div class="columns twelve text-center">
                {!! $calendar->build_calendar(8, 2016, $bookings) !!}
            </div>
        </div>

        <div class="row">
            <div class="columns twelve text-center">
                <h1>ALL BOOKINGS</h1>

            </div>
        </div>

        <div class="row">
            @foreach($bookings as $booking)
                <div class="columns twelve">
                    <h4>{{ $booking->first_name }} {{ $booking->last_name }}</h4>
                    <ul>
                    @foreach($booking->campers as $camper)
                         <li>{{ $camper->camper_title }}</li>
                    @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

    </div>

@endsection