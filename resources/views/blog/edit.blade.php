@extends('layouts.page')

@section('content')
    <div class="pageHero" style="background: url('/images/page-bg.jpg') no-repeat;background-size: cover;">
        <div class="opaque"></div>
        <div class="container text-right pageHeader" style="height: 100%;">
            <h1>Edit {{ $blog->title }}</h1>
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
                <h3>Edit {{ $blog->title }}</h3>
                <form action="{{ route('blog.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $blog->title }}">
                    </div>

                    <div class="form-group">
                        <label for="slug">Blog URL</label>
                        <input class="form-control" type="text" name="slug" id="slug" value="{{ $blog->slug }}">
                    </div>

                    <a href="{{ route('blog.media.index', ['blog' => $blog->id]) }}" class="modal button button-primary">Add images</a>

                    <div class="form-group">
                        <label for="featured_iamge">Featured Image</label>
                        <input class="form-control" type="file" name="featured_image" id="featured_image">
                        @if($blog->featured_image)
                            <img src="{{ asset('storage/'.$blog->featured_image) }}" style="width: 100px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea class="form-control" type="text" name="excerpt" id="excerpt">{{ $blog->excerpt }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" type="text" name="content" id="content">{{ $blog->content }}</textarea>
                    </div>

                    <input type="submit" class="button button-primary" value="Update post">
                </form>
            </div>
        </div>
    </div>

    <div class="modalContainer"></div>
@stop

@section('scripts')

    <script>
    var simplemde = new SimpleMDE({
        showIcons: ["code", "table"],
        styleSelectedText: true,
        element: document.getElementById("content")
    });

    console.log(simplemde);

    function imageWrite(text, size) {
        //When you click on an image on the media library add an image where the
        //cursor was.
        var cm = $('.CodeMirror')[0].CodeMirror;
        var doc = cm.getDoc();
        var cursor = cm.getCursor();
        str = text.replace("/resized", size);
        var img = '<img src='+str+' width="100%"/>';
        cm.replaceRange(img, cursor);
        $('div.close').trigger('click');
    }

    $('body').on('click', '.modal', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href')
        }).done(function(html){
            $('div.modalContainer').show().html(html);
            $('div.overlay').remove();
            $('body').append('<div class="overlay"></div>');
        });
    });

    $('body').on('click', '.close, .overlay', function(e){
       $('div.modalContainer').html('').hide();
       $('div.overlay').remove();
    });

    </script>
    
@stop