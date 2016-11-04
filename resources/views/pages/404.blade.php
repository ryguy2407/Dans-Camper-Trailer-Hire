@extends('layouts.page')

@section('title')
    | 404
@endsection

@section('content')
    <div class="pageHero" style="background: url('images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>404 Page not found</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="columns six">
                <h3>404 Page not found</h3>
                <p>Sorry we can't find what you're looking for</p>
            </div>

            <div class="columns six">
                <h3>CONTACT US</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="name" placeholder="Full Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Phone Number">
                    <textarea name="enquiry" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Submit" class="button-primary">
                </form>
            </div>
        </div>
    </div>
@stop