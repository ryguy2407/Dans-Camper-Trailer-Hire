<div class="row">

        <div class="pickups">
            <h5 class="open-sans">Camper Pickups</h5>
            <hr>
            @foreach($pickups as $notification)
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
</div>

<div class="row">
    <div class="dropoffs">
        <h5 class="open-sans">Camper Drop-off's</h5>
        <hr>
        @foreach($dropoffs as $notification)
            <div class="notification booking">
                <a class="modal" href="{{ route('bookings.show', ['id' => $notification->booking->id]) }}">{{ $notification->booking->first_name }} {{ $notification->booking->last_name }}</a>
                <ul style="margin-bottom: 0px;">
                    <li>Dropoff Date: {{ $notification->booking->dropoff_date }}</li>
                    <li>Camper: {{ $notification->booking->campers->first()->camper_title }}</li>
                </ul>
                <p>Drop off in {{ $notification->day_count }}</p>
            </div>
            @endforeach
    </div>
</div>