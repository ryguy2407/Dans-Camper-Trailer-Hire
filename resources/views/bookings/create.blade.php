@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>REQUEST A BOOKING</h1>
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
            <div class="columns twelve text-center">
                <h2>REQUEST A BOOKING FOR {{ $camper->camper_title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="columns six">
                <div class="note">
                    This is just a quote request only and will not secure your booking, we will
                    get back to you with a confirmation of dates and costs. Once deposit has been
                    arranged and paid we will then secure your booking.
                </div>

                @include('partials.errors')

                <form method="POST" action="{{ route('camper.booking.store', ['camper' => $camper->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="camper_id" value="{{ $camper->id }}">
                    <div class="row">
                        <div class="columns six">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="columns six">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns twelve">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns six">
                            <label for="pickup_date">Pickup Date:</label>
                            <input type="text" name="pickup_date" id="pickup_date" class="datepicker">
                        </div>
                        <div class="columns six">
                            <label for="dropoff_date">Dropoff Date:</label>
                            <input type="text" name="dropoff_date" id="dropoff_date" class="datepicker">
                        </div>
                    </div>
                    <input type="submit" value="Sumbit Quote Request" class="button button-primary">
                </form>
            </div>

            <div class="columns six">
                <div class="imageWrapper cycle-slideshow" data-cycle-slide="img" data-cycle-pager="div.pager" data-cycle-pause-on-hover="true">
                    @foreach($camper->images as $image)
                        @if($image->image_url && $image->featured == 0)
                            <img src="{{ $image->image_url }}" style="width: 100%;" alt="{{ $image->image_alt }}">
                        @endif
                    @endforeach
                </div>
                <div class="pager"></div>
            </div>
        </div>
        <div class="row">
            <div class="columns twelve">
                <h3 class="text-center">{{ $camper->camper_title }} Rates</h3>
                @include('partials.rates')
            </div>
        </div>
    </div>
@stop
