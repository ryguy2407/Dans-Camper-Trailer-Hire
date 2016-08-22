@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>BOOKINGS CALENDAR</h1>
        </div>
    </div>

    <div class="container content">

        <div class="row">
            <div class="columns twelve text-center">
                {!! $calendar->build_calendar(8, 2016, $bookings) !!}
            </div>
        </div>

    </div>

@endsection