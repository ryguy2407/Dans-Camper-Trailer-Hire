    <div class="close">X</div>

    <div class="content container">
        <div class="row">
            <div class="columns six">
                <h4>{{ $booking->first_name }} {{ $booking->last_name }}'s Booking</h4>
                <h5 class="open-sans">Payment Details and Status</h5>
                <ul>
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
                    <li>{{ $booking->campers->first()->camper_title }} ({{ $booking->campers->first()->nickname }})</li>
                </ul>
                <hr>
                <h5 class="open-sans">Dates</h5>
                <ul>
                    <li>Pickup Date: {{ $booking->pickup_date }}</li>
                    <li>Dropoff Date: {{ $booking->dropoff_date }}</li>
                    <li>Email: {{ $booking->email }}</li>
                </ul>
                <hr>
                @if($user->isAdmin())
                    <a href="{{ route('bookings.edit', ['id' => $booking->id])  }}" class="button button-primary modal" style="width: 100%;">Update Booking</a>
                @endif
            </div>

            <div class="columns six notes">
                @if($user->isAdmin())
                    @if($notes->count())
                        <h5 class="open-sans">Booking Notes</h5>
                        <ul>
                            @foreach($notes as $note)
                                <li>{{ $note->note }} | {{ $note->created_at }} |
                                    <span class="delete">
                                        <form style="display: inline-block;margin: 0px;" class="deleteNoteForm" method="POST" action="{{ route('booking.note.destroy', ['booking' => $booking->id, 'note' => $note->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="delete">Delete Note</button>
                                        </form>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                    @endif
                    <h5 class="open-sans">Add a note</h5>
                    <form class="ajax" action="{{ route('booking.note.store', ['id' => $booking->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Type a note here" name="note">
                        <input type="submit" class="button button-primary" value="Add a note">
                    </form>
                    <hr>
                    <form class="ajax" action="{{ route('bookings.destroy', ['id' => $booking->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="DELETE THIS BOOKING" class="button button-red">
                    </form>
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