@if(auth()->user())
    <form class="logout" action="{{ route('sessions.destroy', ['id' => auth()->user()->id]) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="button button-primary">Logout</button>
    </form>
@else
    <a class="button button-primary login" href="{{ route('login') }}">Login</a>
@endif