<div class="row">

        <div class="pickups">
            <h5 class="open-sans">Camper Pickups</h5>
            <hr>
            @foreach($pickups as $pickup)
        	<div class="notification booking">
        		<a class="modal" href="{{ route('bookings.show', ['id' => $pickup->booking->id]) }}">{{ $pickup->booking->first_name }} {{ $pickup->booking->last_name }}</a>
        		<ul style="margin-bottom: 0px;">
        			<li>Pickup Date: {{ $pickup->booking->pickup_date }}</li>
        			<li>Camper: {{ $pickup->booking->campers->first()->camper_title }}</li>
        		</ul>
        		<p>Pickup in {{ $pickup->day_count }}</p>
        	</div>
            @endforeach
        </div>
</div>

<div class="row">
    <div class="dropoffs">
        <h5 class="open-sans">Camper Drop-off's</h5>
        <hr>
        @foreach($dropoffs as $dropoff)
            <div class="notification booking">
                <a class="modal" href="{{ route('bookings.show', ['id' => $dropoff->booking->id]) }}">{{ $dropoff->booking->first_name }} {{ $dropoff->booking->last_name }}</a>
                <ul style="margin-bottom: 0px;">
                    <li>Dropoff Date: {{ $dropoff->booking->dropoff_date }}</li>
                    <li>Camper: {{ $dropoff->booking->campers->first()->camper_title }}</li>
                </ul>
                <p>Drop off in {{ $dropoff->day_count }}</p>
            </div>
        @endforeach
    </div>
</div>