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
                <div class="imageWrapper">
                    <img src="/images/MDC/hero.jpg" style="width: 100%;" alt="">
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