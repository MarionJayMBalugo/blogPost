<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>blog</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="container-fluid">
            @if (Route::has('login'))
                <div class="center links">
                    @auth
                        <button class="btn btn-dark "><a href="{{ url('/home') }}">Home</a></button>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="container">
                <div class="title m-b-md">
                    BBO BLOG
                </div>
                <p>
                    <b>#1</b> 
                    social media platform 20 years from now 
                    <i>-Cebu Times</i>
                </p>
            </div>
        </div>
    </div>
</body>

</html>