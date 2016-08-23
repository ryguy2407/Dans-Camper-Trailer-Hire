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
                        @if($image->image_url && $image->featured == 0)
                            <img src="{{ $image->image_url }}" style="width: 100%;" alt="{{ $image->image_alt }}">
                        @endif
                    @endforeach
                    <h1>{{ $camper->camper_title }}</h1>
                </div>
                <div class="pager"></div>
                {!! $camper->camper_description !!}
            </div>

            <div class="columns six">
                <div class="bookingButton">
                    <a href="{{ route('camper.booking.create', ['camper' => $camper->id,]) }}">BOOK NOW!</a>
                </div>
                <h1>Quick Facts</h1>
                {!! $camper->camper_excerpt !!}
                <a href="#" class="button button-primary">Click here to see all inclusions</a>
                <h2>Rates</h2>
                @include('partials.rates')
                <a class="button button-primary" href="{{ route('camper.booking.create', ['camper' => $camper->id,]) }}" style="display: block;font-size: 18px;">BOOK NOW</a>
            </div>
        </div>
       @if($camper->camper_video)
            <div class="row">
                <div class="columns eight offset-by-two text-center content">
                    <h1>Video Tour</h1>
                    <div class='embed-container'>
                        {!! $camper->camper_video !!}
                    </div>
                </div>
            </div>
        @endif
    </div>

@stop