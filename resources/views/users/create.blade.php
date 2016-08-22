@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Create an account</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns six offset-by-three text-center boxed">
                <h2>Create an account</h2>

                <div class="text-left">
                    @include('partials.errors')
                </div>

                <form action="{{ route('user.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label class="text-left" for="first_name">First Name:</label>
                    <input value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" placeholder="First Name">

                    <label class="text-left" for="last_name">Last Name:</label>
                    <input value="{{ old('last_name') }}" type="text" id="last_name" name="last_name" placeholder="Last Name">

                    <label class="text-left" for="email">Email:</label>
                    <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="Email Address">

                    <label class="text-left" for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password">

                    <label class="text-left" for="password_confirmation">Password Confirmation:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Confimration">

                    <input type="submit" value="Register Account" class="button button-primary">
                </form>

            </div>
        </div>
    </div>

@stop
