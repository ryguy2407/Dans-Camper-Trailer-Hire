    <div class="container content">
        <div class="row">
            <div class="columns twelve">
                <h2>Add holidays</h2>

                <form class="ajax" action="{{ route('holidays.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label class="text-left" for="start_date">Start Date:</label>
                    <input type="text" value="{{ old('start_date') }}" id="start_date" name="start_date" placeholder="Start Date" class="datepicker">

                    <label class="text-left" for="end_date">End Date:</label>
                    <input type="text" value="{{ old('end_date') }}" id="end_date" name="end_date" placeholder="End Date" class="datepicker">

                    <input type="submit" value="Add Holiday Period" class="button button-primary">
                </form>

            </div>
        </div>
        
    </div>
