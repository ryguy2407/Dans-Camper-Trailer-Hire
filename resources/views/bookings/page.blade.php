@extends('layouts.page')

@section('title')
    | Book a Camper
@endsection

@section('content')

    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>BOOK A CAMPER</h1>
        </div>
    </div>

    <div class="container content">

        <div class="row">
            <div class="columns six text-center offset-by-three">
                <h1>BOOK A CAMPER</h1>
                <h4 style="font-family: 'Open Sans', sans-serif;">
                    Please select which camper you would to make a booking enquiry on.
                </h4>
            </div>
        </div>

        <div class="row">
            @foreach($campers as $camper)
                @if($camper->public)
                <div class="columns three text-center">
                    <a href="{{ route('camper.booking.create', ['camper' => $camper->id]) }}">
                        @if($camper->images->first())
                            <img src="{{ $camper->images->first()->image_url }}" style="width: 100%;">
                        @endif
                        <h3>{{ $camper->camper_title }}</h3>
                    </a>
                </div>
                @endif
            @endforeach
        </div>

    </div>

@endsection