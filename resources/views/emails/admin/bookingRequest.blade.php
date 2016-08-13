<h1>
    {{ $booking->first_name }} {{ $booking->last_name }} has requested a booking
</h1>

<h2>Campers Requested</h2>
<ul>
    @foreach($campers->get() as $camper)
        <li>{{ $camper->camper_title }}</li>
    @endforeach
</ul>