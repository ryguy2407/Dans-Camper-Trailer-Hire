@extends('emails.layouts.responsive_email_layout')
@section('content')
    <table border="0" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <td class="templateColumnContainer">
                <img src="http://placekitten.com/g/480/300" width="100%" style="max-width:100%;" class="columnImage" />
            </td>
        </tr>
        <tr>
            <td valign="top" class="templateColumnContainer">
                <h1 style="text-align: center;">{{ $booking->first_name }} {{ $booking->last_name }} has requested a booking</h1>
                <div style="background: #ffe6e8;padding: 15px;">
                    <p style="margin:0px;">
                        Please note that this does not confirm your booking, it is a request only.
                        One of our staff will contact you shortly to confirm booking times and payment
                        of your deposit.<br>
                        Some dates my not be available, our staff will advise shortly.
                    </p>
                </div>
                <h2>Campers Requested</h2>
                <ul>
                    @foreach($campers->get() as $camper)
                        <li>{{ $camper->camper_title }}</li>
                    @endforeach
                </ul>
                <h2>Dates Requested</h2>
                <p>Pickup Date: {{ $booking->pickup_date }}</p>
                <p>Dropoff Date: {{ $booking->dropoff_date }}</p>
            </td>
        </tr>
    </table>
@stop