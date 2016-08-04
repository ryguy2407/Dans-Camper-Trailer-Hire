@include('partials/header')

<div class="slideshowWrapper cycle-slideshow" data-cycle-pager="#adv-custom-pager" data-cycle-slides="div.slide" data-cycle-pager-template="">
    @foreach($campers as $camper)
        <div class="slide">
            <div class="background-bar"></div>
            <div class="container">
                <div class="row">
                    <div class="six columns slideText">
                        <div class="title">
                            <h1 class="white" style="margin-bottom: 0px;margin-top: 0px;">{{ $camper->camper_title }}</h1>
                            @if(count($camper->rates()->where('hire_period', 'extra-day')->first()))
                                <h3 class="orange">from {{ $camper->rates()->where('hire_period', 'extra-day')->first()->off_peak_price }} per night</h3>
                            @endif
                        </div>
                        <div class="link">
                            <a class="button button-primary">BOOK NOW</a>
                        </div>
                    </div>
                    <div class="six columns camper" style="position:relative;">
                        @if($camper->featured->first())
                            <img src="{{ $camper->featured->first()->image_url }}">
                        @endif
                    </div>
                </div>
            </div>

            <div class="container camperText">
                <div class="row">
                    <div class="six columns">
                        <p>
                            {{ $camper->limit_text(strip_tags($camper->camper_description), '39') }}
                        </p>
                        <a href="{{ route('camper.show', ['id' => $camper->id]) }}" class="button button-primary">FIND OUT MORE</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    @endforeach

<div class="container">
    <div id="adv-custom-pager" class="row">
        @foreach($campers as $camper)
            <div class="three columns">
                @if($camper->featured->first())
                    <img src="{{ $camper->featured->first()->image_url }}">
                @endif
                <h2>{{ $camper->camper_title }}</h2>
            </div>
        @endforeach
    </div>
</div>

@include('partials/footer')