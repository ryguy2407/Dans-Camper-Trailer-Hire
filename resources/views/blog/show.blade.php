@extends('layouts.page')

@section('content')
    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>{{ $blog->title }}</h1>
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
        @if(Auth::user() && Auth::user()->isAdmin())
    		<a href="{{ route('blog.edit', ['id' => $blog->id]) }}">Edit this post</a>
    	@endif
    </div>
@stop