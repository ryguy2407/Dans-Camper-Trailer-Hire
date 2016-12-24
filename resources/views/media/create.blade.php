<link rel="stylesheet" href="/css/all.css">

<form class="ajax" method="POST" action="{{ route('blog.media.store', ['blog' => $blog->id]) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="row">
		<input type="file" name="attachments[]" multiple>
	</div>
	<div class="row">
		<input type="submit" value="Upload Images">
	</div>
</form>

<h5 class="open-sans">Current images associated to this post</h5>
<p>Click on an existing image to add it to the blog post or upload a new image and it will appear here.</p>

<div class="imagePreview"> 
	@foreach($blog->media()->where('media_size', 'thumbnail')->get() as $media)
		<div class="image">
			<img src="{{ asset('storage/'.$media->url) }}" width="100" style="display: block;">
			<input type="radio" name="size" value="original">Original<br/>
			<input type="radio" name="size" value="thumbnail">Thumbnail<br/>
			<input type="radio" name="size" value="large">Large<br/>
		</div>
	@endforeach
</div>

<script>
	if (typeof(jQuery) == "undefined") {
	    var iframeBody = document.getElementsByTagName("body")[0];
	    var jQuery = function (selector) { return parent.jQuery(selector, iframeBody); };
	    var $ = jQuery;
	}
	$(document).ready(function(){
		$('div.image img').on('click', function(){
			parent.imageWrite($(this).attr('src'), '');
		});
	});
</script>