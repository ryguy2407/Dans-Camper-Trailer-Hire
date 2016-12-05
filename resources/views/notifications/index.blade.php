<div class="row">
	@if(! $notifications)
    <div class="twelve columns">
        <p>No notifications to show</p>
    </div>
    @endif

    @foreach($notifications as $notification)
        <div class="pickups">
            <h5 class="open-sans">Camper Pickups</h5>
            <hr>
        	<div class="notification booking">
        		<a class="modal" href="{{ route('bookings.show', ['id' => $notification->booking->id]) }}">{{ $notification->booking->first_name }} {{ $notification->booking->last_name }}</a>
        		<ul style="margin-bottom: 0px;">
        			<li>Pickup Date: {{ $notification->booking->pickup_date }}</li>
        			<li>Camper: {{ $notification->booking->campers->first()->camper_title }}</li>
        		</ul>
        		<p>Pickup in {{ $notification->day_count }}</p>
        	</div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="dropoffs">
        <h5 class="open-sans">Camper Drop-off's</h5>
        <hr>
    </div>
</div>