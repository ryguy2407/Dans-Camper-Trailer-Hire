@extends('layouts.page')

@section('title')
    | Specials
@endsection

@section('content')
    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Specials</h1>
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
            <div class="columns twelve">
            <h2 style="text-align: center;">NOVEMBER SPECIALS TIME REMAINING</h2>
                @include('partials.clock')    
                <div class="row">
                    <div class="columns three special">
                        <h3 style="margin-bottom: 0px;">MDC Campers</h3>
                        <h4 class="red">$50 per night</h4>  
                        <a href="/camper/mdc-camper">
                            <img src="/images/MDC/hero.jpg" style="width: 100%;">  
                        </a>
                        <a href="/camper/mdc-camper" class="button button-primary" style="display: block;">BOOK NOW</a> 
                    </div>
                    <div class="columns three special">
                        <h3 style="margin-bottom: 0px;">GIC Campers</h3>
                        <h4 class="red">$50 per night</h4>  
                        <a href="/camper/gic-camper">
                            <img src="/images/GIC/gic1.jpg" style="width: 100%;">  
                        </a>
                        <a href="/camper/gic-camper" class="button button-primary" style="display: block;">BOOK NOW</a>
                    </div>
                    <div class="columns three special">
                        <h3 style="margin-bottom: 0px;">JAYCO Hawk</h3>
                        <h4 class="red">$65 per night</h4>  
                        <a href="/camper/jayco-hawk">
                            <img src="/images/HAWK/jayco01.jpg" style="width: 100%;">  
                        </a>
                        <a href="/camper/jayco-hawk" class="button button-primary" style="display: block;">BOOK NOW</a>
                    </div>
                    <div class="columns three special">
                        <h3 style="margin-bottom: 0px;">JAYCO Expanda</h3>
                        <h4 class="red">$95 per night</h4>  
                        <a href="/camper/jayco-expanda">
                            <img src="/images/EXPANDA/specials-expanda.jpg" style="width: 100%;">
                        </a>
                        <a href="/camper/jayco-expanda" class="button button-primary" style="display: block;">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        function getTimeRemaining(endtime) {
          var t = Date.parse(endtime) - Date.parse(new Date());
          var seconds = Math.floor((t / 1000) % 60);
          var minutes = Math.floor((t / 1000 / 60) % 60);
          var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
          var days = Math.floor(t / (1000 * 60 * 60 * 24));
          return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
          };
        }

        function initializeClock(id, endtime) {
          var clock = document.getElementById(id);
          var daysSpan = clock.querySelector('.days');
          var hoursSpan = clock.querySelector('.hours');
          var minutesSpan = clock.querySelector('.minutes');
          var secondsSpan = clock.querySelector('.seconds');

          function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
              clearInterval(timeinterval);
            }
          }

          updateClock();
          var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse("November 9, 2016") + 30 * 24 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>
@stop