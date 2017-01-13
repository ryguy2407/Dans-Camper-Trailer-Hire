@extends('layouts.page')

@section('title')
    | {{ $blog->title }}
@endsection

@section('content')
    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>{{ str_limit($blog->title, 35) }}</h1>
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
            <div class="columns eight">
                {!! $blog->markdown($blog->content) !!}
            </div>

            <div class="columns four">
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

        <div class="row">
            <div class="columns eight">
                @if(Auth::user() && Auth::user()->isAdmin())
                    <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="button button-primary" style="display: block;">Edit this post</a>
                @endif
            </div>
        </div>
    </div>
@stop