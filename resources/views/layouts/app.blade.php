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
    <link href="{{ asset('/css/materialize.min.css') }}" rel="stylesheet">
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">


    <!-- Scripts -->
<<<<<<< HEAD
<<<<<<< HEAD
    <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/materialize.min.js') }}"></script>

    <script src="{{ asset('/js/libraries/linq/linq.js') }}"></script>
    <script src="{{ asset('/js/libraries/angular/angular.js') }}"></script>
    <script src="{{ asset('/js/angular/jaoApp.js') }}"></script>
=======
>>>>>>> 68277ff0bbb3ff8a6d16f65a9b60a876905b6952
=======
>>>>>>> origin/master
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
</head>
<body>
    <div id="app">

        @include('partials.navbar')

        <div class="row" class="mCustomScrollbar" data-mcs-theme="dark">
            @if(Auth::user() && isPlayable())
            <div class="col s3">
                @include('partials.sidebar')
            </div>
            @endif
            <div class="col {{ Auth::user() && isPlayable() ? 's9' : 's12'}}">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
<<<<<<< HEAD
<<<<<<< HEAD

    <script src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

=======
>>>>>>> 68277ff0bbb3ff8a6d16f65a9b60a876905b6952
=======
>>>>>>> origin/master
    <script src="{{ asset('/js/app.js') }}"></script>

    <script src="{{ asset('/js/libraries/linq/linq.js') }}"></script>

    <script src="{{ asset('/js/libraries/jQuery/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('/js/libraries/jQuery/jquery-ui.js') }}"></script>

    <script src="{{ asset('/js/materialize.min.js') }}"></script>

    <script src="{{ asset('/js/libraries/angular/angular.js') }}"></script>
    <script src="{{ asset('/js/libraries/angular/angular-dragdrop.js') }}"></script>
    <script src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('/js/angular/jaoApp.js') }}"></script>
    <script src="{{ asset('/js/angular/playerModule/jaoApp.player.js') }}"></script>
    <script src="{{ asset('/js/angular/playerModule/jaoApp.player.createController.js') }}"></script>
    <script src="{{ asset('/js/angular/playerModule/jaoApp.player.detailsController.js') }}"></script>

</body>
</html>
