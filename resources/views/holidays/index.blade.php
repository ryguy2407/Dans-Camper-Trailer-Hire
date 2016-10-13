<a href="{{ route('holidays.create') }}" class="button button-primary modal">Add a new holiday period</a>
<ul>
    @foreach($holidays as $holiday)
        <li>
            <a class="modal" href="{{ route('holidays.edit', ['id' => $holiday->id]) }}">Edit Holiday Period</a>
            <ul>
                <li>Pickup Date: {{ $holiday->start_date }}</li>
                <li>Dropoff Date: {{ $holiday->end_date }}</li>
            </ul>
        </li>
    @endforeach
</ul>
{{ $holidays->links() }}