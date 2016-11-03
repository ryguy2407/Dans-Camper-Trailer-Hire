@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>CREATE A BOOKING</h1>
        </div>
    </div>

    <div class="content container">
        <div class="row">
            <div class="columns six offset-by-three boxed">
                <h3 class="text-center">CREATE A BOOKING</h3>

                <div class="text-left">
                    @include('partials.errors')
                </div>

                <form action="{{ route('bookings.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label class="text-left" for="first_name">First Name:</label>
                    <input type="text" value="{{ old('first_name') }}" id="first_name" name="first_name" placeholder="First Name">

                    <label class="text-left" for="last_name">Last Name:</label>
                    <input type="text" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">

                    <label class="text-left" for="email">Email:</label>
                    <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="Email Address">

                    <label class="text-left" for="camper_id">Camper:</label>
                    <select name="camper_id" id="camper_id" style="width: 100%;">
                        @foreach($campers as $camper)
                            <option value="{{ $camper->id }}">{{ $camper->camper_title }}</option>
                        @endforeach
                    </select>

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

                    <input type="submit" value="Create Camper" class="button button-primary">
                </form>
            </div>
        </div>
    </div>

@stop