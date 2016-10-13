<div class="close">X</div>
<div class="content container">
    <div class="row">
        <div class="columns twelve">
            <h3 class="text-center">UPDATE HOLIDAY PERIOD</h3>

            <form class="ajax" action="{{ route('holidays.update', ['id' => $holiday->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <label class="text-left" for="start_date">Start Date:</label>
                <input class="datepicker" type="text" value="{{ $holiday->start_date }}" id="start_date" name="start_date" placeholder="Start Date">

                <label class="text-left" for="end_date">End Date:</label>
                <input class="datepicker" type="text" value="{{ $holiday->end_date }}" id="end_date" name="end_date" placeholder="End Date">

                <input type="submit" value="Update Holiday Period" class="button button-primary">
            </form>

            <form class="ajax" action="{{ route('holidays.destroy', ['id' => $holiday->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete Holiday Period" class="button button-red">
            </form>
        </div>
    </div>
</div>