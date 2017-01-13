@extends('layouts.page')

@section('content')

	<div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Blog Posts</h1>
        </div>
    </div>

    <div class="container content">

    	<div class="row">
    		<div class="columns twelve center">
    			@if(Auth::user() && Auth::user()->isAdmin())
    				<a href="{{ route('blog.create') }}" class="button button-primary" style="display: block;">Create a new blog post</a>
    			@endif
    		</div>
    	</div>

    	@foreach($posts->chunk(3) as $post)
	    	<div class="row">
	    		@foreach($post as $post)
		    		<div class="columns three">
		    			<h5><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
		    			@if($post->featured_image)
		    				<a href="{{ route('blog.show', ['id' => $post->id]) }}">
		    					<img src="{{ asset('storage/'.$post->featured_image) }}" style="width: 100%;">
		    				</a>
		    			@endif
		    			<p>{{ $post->excerpt }}</p>
		    		</div>
	    		@endforeach
	    	</div>
    	@endforeach

    </div>

@stop