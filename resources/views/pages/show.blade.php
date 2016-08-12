@extends('layouts.page')

@section('content')
    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>{{ $page->page_title }}</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns six">
                <h3>{{ $page->page_title }}</h3>
                {!! $page->page_content !!}
            </div>

            <div class="columns six">
                <h3>CONTACT US</h3>
                <form action="#">
                    <input type="text" name="name" placeholder="Full Name">
                    <input type="email" name="email" placeholder="Full Name">
                    <input type="text" name="phone" placeholder="Phone Number">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Submit" class="button-primary">
                </form>
            </div>
        </div>

        @if($page->slug == 'rates')
            <div class="row">
                <div class="columns twelve">
                    <h1 class="orange text-center">RATES TABLE</h1>
                    <table style="width: 100%;">
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
                        <tr>
                            <td><a href="#">MDC SOFT FLOOR CAMPER</a></td>
                            <td>4 - 6</td>
                            <td>
                                <div class="columns six">$250</div>
                                <div class="columns six">N/A</div>
                            </td>
                            <td>
                                <div class="columns six">$350</div>
                                <div class="columns six">$550</div>
                            </td>
                            <td>
                                <div class="columns six">$50</div>
                                <div class="columns six">$80</div>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="#">JAYCO HAWK</a></td>
                            <td>4 - 6</td>
                            <td>
                                <div class="columns six">$350</div>
                                <div class="columns six">N/A</div>
                            </td>
                            <td>
                                <div class="columns six">$550</div>
                                <div class="columns six">$650</div>
                            </td>
                            <td>
                                <div class="columns six">$65</div>
                                <div class="columns six">$90</div>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="#">JAYCO EXPANDA</a></td>
                            <td>4 - 6</td>
                            <td>
                                <div class="columns six">$460</div>
                                <div class="columns six">N/A</div>
                            </td>
                            <td>
                                <div class="columns six">$665</div>
                                <div class="columns six">$805</div>
                            </td>
                            <td>
                                <div class="columns six">$65</div>
                                <div class="columns six">$90</div>
                            </td>
                        </tr>
                    </table>
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