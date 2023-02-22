<a href="/">Inicio</a>

@auth
    <a href="/dashboard">Dashboard</a>

    <form style="display: inline" action="/logout" method="POST">
        @csrf
        <a href="#" onclick="this.closest('form').submit()">Log out</a>
    </form>
@else
    <a href="/login">Login</a>

@endauth


@if (session('status'))
    <br>
    {{ session('status') }}
@endif
{{-- <a href="/dashboard">Dashboard</a>
<a href="#">Log out</a> --}}
