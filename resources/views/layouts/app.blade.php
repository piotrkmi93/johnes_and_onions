<!DOCTYPE html>
<html lang="en" ng-app="jaoApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/libraries/angular/angular.js"></script>
    <script src="/js/angular/jaoApp.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            @if(getPlayer())
                            <li><a>{{ getPlayer()->character->name }}</a></li>
                            <li class="player-quick-info">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ (getPlayer()->experience_points * 100) / getPlayer()->required_experience_points }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ (getPlayer()->experience_points * 100) / getPlayer()->required_experience_points }}%"></div>
                                    <span>Level {{ getPlayer()->character->level }}</span>
                                </div>
                            </li>
                            @endif
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="{{ Auth::user() && isPlayable() ? 'container-fluid' : 'container' }}">
            <div class="row">
                @if(Auth::user() && isPlayable())
                <div class="col-md-3">
                    @include('partials.sidebar')
                </div>
                @endif
                <div class="{{ Auth::user() && isPlayable() ? 'col-md-9' : 'col-md-12'}}">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
