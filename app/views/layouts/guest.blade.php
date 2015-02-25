<!DOCTYPE html>
<html>
    <head>
        <title>Perpustakaan Online Blubuks</title>
        <link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        <script src="{{ asset('components/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('packages/uikit/js/uikit.min.js')}}"></script>
        @yield('asset')
    </head>
    <body>
    <div class="uk-container uk-container-center uk-margin-top">
        <nav class="uk-navbar">
            <a href="/" class="uk-navbar-brand uk-hidden-small">Blubuks</a>
            <div class="uk-navbar-flip uk-navbar-content">
                <a class="" href="{{ URL::to('login') }}">Login</a> | 
                <a class="" href="{{ URL::to('signup') }}">Daftar</a>
            </div>
            <div class="uk-navbar-brand uk-navbar-center uk-visible-small">Blubuks</div>
        </nav>
        <div class="uk-container-center uk-margin-top">
            @include('layouts.partials.alert')
            @yield('content')
        </div>
    </div>

    </body>
</html>
