<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Laravel Perpus</title>

        <link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        <script src="{{ asset('components/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('packages/uikit/js/uikit.min.js')}}"></script>
        @yield('asset')
        <!--
        <h1 class="uk-heading-large" >
            @yield('title')
            @yield('title-button')
        </h1>
        -->
    </head>
    <body>
    <div class="uk-container uk-container-center uk-margin-top">
        <nav class="uk-navbar">
            <a href="#" class="uk-navbar-brand uk-hidden-small">LaraPus</a>
            <ul class="uk-navbar-nav uk-hidden-small">
                
                @if (Sentry::getUser()->hasPermission('regular'))
                    @include('dashboard.navigations.regular')
                @endif

                @if (Sentry::getUser()->hasPermission('admin'))
                    @include('dashboard.navigations.admin')
                @endif

            </ul>
            <div class="uk-navbar-nav uk-navbar-flip" >
                <li class="uk-parent" data-uk-dropdown>
                    <a href="" > {{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }} </a>
                    <div class="uk-dropdown uk-dropdown-navbar" >
                        <ul class="uk-nav uk-nav-navbar" >
                            <li > {{ link_to_route('home.editpassword', 'Ubah Password')}} </li>
                            <li class="uk-nav-divider" > </li>
                            <li > <a href="{{ URL::to('logout') }}" > Logout</a> </li>
                        </ul>
                    </div>
                </li>
            </div>
            <div class="uk-navbar-brand uk-navbar-center uk-visible-small">LaraPus</div>
        </nav>
        <div class="uk-container-center uk-margin-top">
            <div class="uk-container-center uk-margin-top" >
                @include('layouts.partials.alert')
                <ul class="uk-breadcrumb" >
                    @yield('breadcrumb')
                </ul>

                <h1 class="uk-heading-large" > 
                    @yield('title') 
                    @yield('title-button')
                </h1>

                @include('layouts.partials.validation')
                
                @yield('content')

            </div>
        </div>
    </body>
</html>