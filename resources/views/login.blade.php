<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-witdh, initial-scale=1">
        <title>Aprendible</title>
    </head>
    <body>
        @include('partials.nav')

        <h1>Login aprendible</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li> {{ $error }}</li>
                @endforeach
            </ul>

        @endif

        <form method="POST" action="">
        @csrf
            <label for="">
                <input name="email" type="text" required autofocusecit value="{{ old('email')}}" placeholder="Email...">
            </label><br>
            <label for="">
               <input name="password" type="password" placeholder="Password...">
            </label><br>
            <label for="">
                <input type="checkbox" name="remenber">
                Recuerda mi sesión
            </label><br>
            <button type="submit">Login</button>



        </form>
    </body>

</html>
