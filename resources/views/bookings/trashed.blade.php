<div class="close">X</div>

    <div class="container content">
        <div class="row">
            <div class="columns twelve">
                <h2>{{ $booking->first_name }} {{ $booking->last_name }}'s Booking - <em>Archived</em></h2>
                @include('partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="columns six">
                <h5 class="open-sans">Payment Details and Status</h5>
                <ul>
                    <li>Booking Confirmed: {{ $booking->status($booking->approved) }}</li>
                    <li>Deposit Paid: {{ $booking->status($booking->deposit) }}</li>
                    @if($booking->deposit_amount)
                        <li>Deposit Amount: ${{ $booking->deposit_amount }}</li>
                    @endif
                    @if($booking->hire_amount)
                        <li>Total Hire Amount: ${{ $booking->hire_amount }}</li>
                    @endif
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

                <a href="{{ route('bookings.restore', ['id' => $booking->id]) }}" class="button-red">RESTORE THIS BOOKING</a>
            </div>

            <div class="columns six">
                @if($user->isAdmin())
                    <h5 class="open-sans">Booking Notes</h5>
                    <ul>
                        @foreach($notes as $note)
                            <li>{{ $note->note }} | {{ $note->created_at }}</li>
                        @endforeach
                    </ul>
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