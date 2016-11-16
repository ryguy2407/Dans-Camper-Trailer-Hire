<h4 class="open-sans">
    Notifications
</h4>

<div class="row">
	@if(! $notifications)
    <div class="twelve columns">
        <p>No notifications to show</p>
    </div>
    @endif

    @foreach($notifications as $notification)
    	<div class="notification booking">
    		<a class="modal" href="{{ route('bookings.show', ['id' => $notification->booking->id]) }}">{{ $notification->booking->first_name }} {{ $notification->booking->last_name }}</a>
    		<ul style="margin-bottom: 0px;">
    			<li>Pickup Date: {{ $notification->booking->pickup_date }}</li>
    			<li>Camper: {{ $notification->booking->campers->first()->camper_title }}</li>
    		</ul>
    		<p>Pickup in {{ $notification->day_count }}</p>
    	</div>
    @endforeach
</div>