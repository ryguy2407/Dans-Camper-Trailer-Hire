@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('failed'))
    <div class="alert alert-danger">
        <p style="margin: 0px;">{{ session('failed') }}</p>
    </div>
@endif