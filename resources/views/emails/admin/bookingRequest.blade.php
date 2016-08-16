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
                <h1 style="text-align: center;font-family: Arial;">{{ $booking->first_name }} {{ $booking->last_name }} has requested a booking</h1>
                <h2 style="font-family: Arial;">Campers Requested</h2>
                <ul>
                    @foreach($campers->get() as $camper)
                        <li style="font-family: Arial;">{{ $camper->camper_title }}</li>
                @endforeach
            </td>
        </tr>
    </table>
@stop