@extends('emails.layouts.responsive_email_layout')
@section('content')
    <table border="0" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <td class="templateColumnContainer" style="text-align: center">
                <img src="{{ url('/images/logo.png') }}" width="50%" style="max-width:100%;" class="columnImage" />
            </td>
        </tr>
        <tr>
            <td valign="top" class="templateColumnContainer">
                <h1 style="text-align: center;font-family: Arial;">{{ $booking->first_name }} {{ $booking->last_name }} has requested a booking</h1>
                <h2 style="font-family: Arial;">Campers Requested</h2>
                <ul>
                    @foreach($campers->get() as $camper)
                        <li style="font-family: Arial;">{{ $camper->camper_title }}</li>
                @endforeach
                </ul>
                <h2 style="font-family: Arial;">Dates Requested</h2>
                <p style="font-family: Arial;">Pickup Date: {{ $booking->pickup_date }}</p>
                <p style="font-family: Arial;">Dropoff Date: {{ $booking->dropoff_date }}</p>
            </td>
        </tr>
    </table>
@stop