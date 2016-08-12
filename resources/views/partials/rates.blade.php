<table style="width: 100%;">
    <tr>
        <th>4 DAY HIRE (3 NIGHTS)</th>
        <th>7 DAY HIRE (6 NIGHTS)</th>
        <th>EXTRA DAYS</th>
    </tr>
    <tr>
        <td>
            <div class="columns six">OFF PEAK</div>
            <div class="columns six">PEAK</div>
        <td>
            <div class="columns six">OFF PEAK</div>
            <div class="columns six">PEAK</div>
        </td>
        <td>
            <div class="columns six">OFF PEAK</div>
            <div class="columns six">PEAK</div>
        </td>
    </tr>
    <tr>
        @foreach($camper->rates as $rate)
            @if($rate->hire_period == 'four-day')
                <td>
                    <div class="columns six">{{ $rate->off_peak_price }}</div>
                    <div class="columns six">{{ $rate->peak_price }}</div>
                </td>
            @endif
            @if($rate->hire_period == 'seven-day')
                <td>
                    <div class="columns six">{{ $rate->off_peak_price }}</div>
                    <div class="columns six">{{ $rate->peak_price }}</div>
                </td>
            @endif
            @if($rate->hire_period == 'extra-day')
                <td>
                    <div class="columns six">{{ $rate->off_peak_price }}</div>
                    <div class="columns six">{{ $rate->peak_price }}</div>
                </td>
            @endif
        @endforeach
    </tr>
</table>