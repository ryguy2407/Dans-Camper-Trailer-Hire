@extends('layouts.page')

@section('content')
    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Create a blog post</h1>
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
            <div class="columns eight offset-by-two">
                <h3>Create a blog post</h3>
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="featured_image">Featured Image</label>
                        <input class="form-control" type="file" name="featured_image" id="featured_image" value="{{ old('featured_image') }}">
                    </div>

                    <input type="hidden" name="slug" id="slug" value="">

                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea class="form-control" type="text" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" type="text" name="content" id="content">{{ old('content') }}</textarea>
                    </div>

                    <input type="submit" class="button button-primary">
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')

    <script>
    var simplemde = new SimpleMDE({
        showIcons: ["code", "table"],
        styleSelectedText: true,
        element: document.getElementById("content")
    });

    $("#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);        
    });
    </script>
    
@stop