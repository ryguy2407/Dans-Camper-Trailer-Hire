@extends('layouts.page')

@section('content')

    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Login</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns six offset-by-three text-center boxed">
                <h2>Login</h2>

                <div class="text-left">
                    @include('partials.errors')
                </div>

                <form action="{{ route('sessions.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label class="text-left" for="email">Email:</label>
                    <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="Email Address">

                    <label class="text-left" for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password">

                    <input type="submit" value="Login" class="button button-primary">
                </form>

            </div>
        </div>
    </div>

@stop
