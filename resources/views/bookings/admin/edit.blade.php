<div class="close">X</div>
    <div class="content container">
        <div class="row">
            <div class="columns twelve">
                <h3 class="text-center">UPDATE BOOKING</h3>

                <div class="text-left">
                    @include('partials.errors')
                </div>

                <form class="ajax" action="{{ route('bookings.update', ['id' => $booking->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <label class="text-left" for="first_name">First Name:</label>
                    <input type="text" value="{{ $booking->first_name }}" id="first_name" name="first_name" placeholder="First Name">

                    <label class="text-left" for="last_name">Last Name:</label>
                    <input type="text" value="{{ $booking->last_name }}" id="last_name" name="last_name" placeholder="Last Name">

                    <label class="text-left" for="email">Email:</label>
                    <input type="email" value="{{ $booking->email }}" id="email" name="email" placeholder="Email Address">

                    <label class="text-left" for="camper_id">Camper:</label>
                    <select name="camper_id" id="camper_id" style="width: 100%;">
                        <option value="1">MDC Camper</option>
                        <option value="2">GIC Camper</option>
                        <option value="3">Jayco Hawk</option>
                        <option value="4">Jayco Expanda</option>
                    </select>

                    <div class="row">
                        <div class="columns six">
                            <label for="pickup_date">Pickup Date:</label>
                            <input value="{{ $booking->pickup_date }}" type="text" name="pickup_date" id="pickup_date" class="datepicker">
                        </div>
                        <div class="columns six">
                            <label for="dropoff_date">Dropoff Date:</label>
                            <input value="{{ $booking->dropoff_date }}" type="text" name="dropoff_date" id="dropoff_date" class="datepicker">
                        </div>
                    </div>

                    <label for="deposit">Deposit Paid</label>
                    <select name="deposit" id="deposit" style="width: 100%;">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>

                    <label class="text-left" for="deposit_amount">Deposit Amount:</label>
                    <input type="text" value="{{ $booking->deposit_amount }}" id="deposit_amount" name="deposit_amount" placeholder="Deposit Amount">

                    <label class="text-left" for="hire_amount">Hire Amount:</label>
                    <input type="text" value="{{ $booking->hire_amount }}" id="hire_amount" name="hire_amount" placeholder="Hire Amount">

                    <input type="submit" value="Update Camper" class="button button-primary">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('select#camper_id').val({{ $booking->campers->first()->id }});
            $('select#approved').val({{ $booking->approved }});
            $('select#deposit').val({{ $booking->deposit }});
        });
    </script>