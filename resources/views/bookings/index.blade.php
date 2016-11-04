@foreach($pending as $booking)
	<div class="booking">
        <a class="modal" href="{{ route('bookings.show', ['id' => $booking->id]) }}">{{ $booking->first_name }} {{ $booking->last_name }} - {{ $booking->campers->first()->camper_title }}</a>
        <ul>
            <li>Pickup Date: {{ $booking->pickup_date }}</li>
            <li>Dropoff Date: {{ $booking->dropoff_date }}</li>
        </ul>
	</div>
@endforeach

<div class="pagination"> 
	{{ $pending->links() }}
</div>