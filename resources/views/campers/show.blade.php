@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>{{ $camper->camper_title }}</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns six">
                <div class="imageWrapper cycle-slideshow" data-cycle-slide="img" data-cycle-pager="div.pager" data-cycle-pause-on-hover="true">
                    @foreach($images as $image)
                        <img src="{{ $image->image_url }}" style="width: 100%;" alt="{{ $image->image_alt }}">
                    @endforeach
                    <h1>{{ $camper->camper_title }}</h1>
                </div>
                <div class="pager"></div>
                {!! $camper->camper_description !!}
            </div>

            <div class="columns six">
                <div class="bookingButton">
                    <a href="#">BOOK NOW!</a>
                </div>
                <h1>Quick Facts</h1>
                {!! $camper->camper_excerpt !!}
                <a href="#" class="button button-primary">Click here to see all inclusions</a>
                <h2>Rates</h2>
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
                        @foreach($rates as $rate)
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
                <a class="button button-primary" style="display: block;font-size: 18px;">BOOK NOW</a>
            </div>
        </div>
        <div class="row">
            <div class="columns eight offset-by-two text-center content">
                <h1>Video Tour</h1>
                <div class='embed-container'>
                    {!! $camper->camper_video !!}
                </div>
            </div>
        </div>
    </div>

@stop