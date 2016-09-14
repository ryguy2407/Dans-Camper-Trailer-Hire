@extends('layouts.page')

@section('title')
    | {{ $page->page_title }}
@endsection

@section('content')
    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>{{ $page->page_title }}</h1>
        </div>
    </div>

    @if (session('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container content">
        <div class="row">
            <div class="columns six">
                <h3>{{ $page->page_title }}</h3>
                {!! $page->page_content !!}
            </div>

            <div class="columns six">
                <h3>CONTACT US</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="name" placeholder="Full Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Phone Number">
                    <textarea name="enquiry" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Submit" class="button-primary">
                </form>
            </div>
        </div>

        @if($page->slug == 'rates')
            <div class="row">
                <div class="columns twelve">
                    <h1 class="orange text-center">RATES TABLE</h1>
                    <table style="width: 100%;" class="ratesTable">
                        <tr>
                            <th>CAMPER TYPE</th>
                            <th>SLEEPS</th>
                            <th>4 DAY HIRE (3 NIGHTS)</th>
                            <th>7 DAY HIRE (6 NIGHTS)</th>
                            <th>EXTRA DAYS</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="columns six">OFF<br>PEAK</div>
                                <div class="columns six">PEAK</div>
                            </td>
                            <td>
                                <div class="columns six">OFF<br>PEAK</div>
                                <div class="columns six">PEAK</div>
                            </td>
                            <td>
                                <div class="columns six">OFF<br>PEAK</div>
                                <div class="columns six">PEAK</div>
                            </td>
                        </tr>
                        @foreach($campers as $camper)
                            <tr>
                                <td><a href="{{ route('camper.show', ['id' => $camper->id]) }}">{{ $camper->camper_title }}</a></td>
                                <td>4 - 6</td>
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
                        @endforeach
                    </table>

                    <div class="mobileTable">
                        <div class="row">
                            @foreach($campers as $camper)
                                <div class="columns twelve camper">
                                    <h5>{{ $camper->camper_title }}</h5>
                                    <ul>
                                        @foreach($camper->rates as $rate)
                                            @if($rate->hire_period == 'four-day')
                                                <li>4 DAY HIRE OFF PEAK: {{ $rate->off_peak_price }}</li>
                                                <li>4 DAY HIRE PEAK: {{ $rate->peak_price }}</li>
                                            @endif
                                            @if($rate->hire_period == 'seven-day')
                                                <li>7 DAY HIRE OFF PEAK: {{ $rate->off_peak_price }}</li>
                                                <li>7 DAY HIRE PEAK: {{ $rate->peak_price }}</li>
                                            @endif
                                            @if($rate->hire_period == 'extra-day')
                                                <li>EXTRA DAY HIRE OFF PEAK: {{ $rate->off_peak_price }}</li>
                                                <li>EXTRA DAY HIRE PEAK: {{ $rate->peak_price }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if($page->slug == 'contact')

        <div id="map"></div>

        <script>

            function initMap() {
                var myLatLng = {lat: -25.363, lng: 131.044};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: myLatLng,
                    scrollwheel: false
                });

                var infowindow = new google.maps.InfoWindow({
                    content: '<h5>Dans Camper Trailer Hire</h5><h6>12 Cameron Street, Clontarf QLD</h6>'
                });

                geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': '12 Cameron Street, Clontarf QLD' }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            title: 'Dan/\'s Camper Trailer Hire'
                        });
                        infowindow.open(map, marker);
                    }
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiL9Be-DA2Wz8kTNAgHOEbdd-GS_UYN4Y&callback=initMap">
        </script>
    @endif
@stop