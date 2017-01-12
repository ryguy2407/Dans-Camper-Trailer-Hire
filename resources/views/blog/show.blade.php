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