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
            <div class="columns twelve" style="position: relative;">
                <h1>Hi {{ $user->name }} <a href="#"> <small style="font-size: 50%;">- edit</small></a></h1>
                <a href="{{ route('bookings.create') }}" style="position:absolute;top: 10px;right: 0;font-size: 120%;width: 300px;" class="button button-primary ajax">CREATE A BOOKING</a>
            </div>
        </div>

        <div class="row">
            @if($user->isAdmin())
                <div class="columns four">
                    <h4 class="open-sans">Pending Booking Requests</h4>
                    <ul>
                        @foreach($pending as $booking)
                            <li>
                                <a href="{{ route('bookings.show', ['id' => $booking->id]) }}">{{ $booking->first_name }} {{ $booking->last_name }} - {{ $booking->campers->first()->camper_title }}</a>
                                <ul>
                                    <li>Pickup Date: {{ $booking->pickup_date }}</li>
                                    <li>Dropoff Date: {{ $booking->dropoff_date }}</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    {{ $pending->links() }}

                    <hr>

                    <h4 class="open-sans" style="margin-top: 20px;">Archived Bookings</h4>
                    <form action="#">
                        <input type="tex" name="archiveSearch" placeholder="Search bookings">
                    </form>
                    <ul>
                        @foreach($trashed as $trash)
                            <li>
                                {{ $trash->first_name }} {{ $trash->last_name }} - <a href="{{ route('bookings.restore', ['id' => $trash->id]) }}">Restore</a>
                                <ul>
                                    <li>Camper: {{ $trash->campers->first()->camper_title }}</li>
                                    <li>Pickup Date: {{ $trash->pickup_date }}</li>
                                    <li>Dropoff Date: {{ $trash->dropoff_date }}</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                    {{ $trashed->links() }}

                </div>
                <div class="columns eight">
                    <h4 class="open-sans">Booking Calendar</h4>
                    {!! $calendar->build_calendar(date('n'), date('Y'), $bookings) !!}
                </div>


            @endif
        </div>
    </div>

@endsection