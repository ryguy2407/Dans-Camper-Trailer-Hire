@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>BOOKING</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns twelve">
                <h2>{{ $booking->first_name }} {{ $booking->last_name }}'s Booking</h2>
                @include('partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="columns six">
                <h5 class="open-sans">Payment Details and Status</h5>
                <ul>
                    <li>Booking Confirmed: {{ $booking->status($booking->approved) }}</li>
                    <li>Deposit Paid: {{ $booking->status($booking->deposit) }}</li>
                </ul>
                <hr>
                <h5 class="open-sans">Campers</h5>
                <ul>
                    <li>{{ $booking->campers->first()->camper_title }}</li>
                </ul>
                <hr>
                <h5 class="open-sans">Dates</h5>
                <ul>
                    <li>Pickup Date: {{ $booking->pickup_date }}</li>
                    <li>Dropoff Date: {{ $booking->dropoff_date }}</li>
                </ul>
                <hr>
                @if($user->isAdmin())
                    <a href="{{ route('bookings.edit', ['id' => $booking->id])  }}" class="button button-primary" style="width: 100%;">Update Booking</a>
                    <form action="{{ route('bookings.destroy', ['id' => $booking->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Archive this booking" class="button button-red">
                    </form>
                @endif
            </div>

            <div class="columns six">
                @if($user->isAdmin())
                    <h5 class="open-sans">Booking Notes</h5>
                    <ul>
                        @foreach($notes as $note)
                            <li>{{ $note->note }} | {{ $note->created_at }} |
                                <span class="delete">
                                    <form style="display: inline-block;margin: 0px;" class="deleteNoteForm" method="POST" action="{{ route('booking.note.destroy', ['booking' => $booking->id, 'note' => $note->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="delete">Delete Note</button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <h5 class="open-sans">Add a note</h5>
                    <form action="{{ route('booking.note.store', ['id' => $booking->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Type a note here" name="note">
                        <input type="submit" class="button button-primary" value="Add a note">
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
           $('form.deleteNoteForm a').on('click', function(){
               $(this).parent('form').submit();
           });
        });
    </script>

@stop