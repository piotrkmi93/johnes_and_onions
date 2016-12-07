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
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/libraries/jQuery/jquery-3.1.1.js') }}"></script>

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

    <script src="{{ asset('/js/app.js') }}"></script>

    <script src="{{ asset('/js/libraries/linq/linq.js') }}"></script>

    <script src="{{ asset('/js/libraries/jQuery/jquery-ui.js') }}"></script>

    <script src="{{ asset('/js/materialize.min.js') }}"></script>

    <script src="{{ asset('/js/libraries/angular/angular.js') }}"></script>
    <script src="{{ asset('/js/libraries/angular/angular-dragdrop.js') }}"></script>
    <script src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('/js/angular/jaoApp.js') }}"></script>

    <script src="{{ asset('/js/angular/player/jaoApp.player.js') }}"></script>
    <script src="{{ asset('/js/angular/player/jaoApp.player.createController.js') }}"></script>
    <script src="{{ asset('/js/angular/player/jaoApp.player.detailsController.js') }}"></script>

    <script src="{{ asset('/js/angular/nav/jaoApp.nav.js') }}"></script>
    <script src="{{ asset('/js/angular/nav/jaoApp.nav.navController.js') }}"></script>

    <script src="{{ asset('/js/angular/battle/jaoApp.battle.js') }}"></script>
    <script src="{{ asset('/js/angular/battle/jaoApp.battle.battleController.js') }}"></script>

    <script src="{{ asset('/js/angular/shop/jaoApp.shop.js') }}"></script>
    <script src="{{ asset('/js/angular/shop/jaoApp.shop.shopController.js') }}"></script>

    <script src="{{ asset('/js/angular/ranking/jaoApp.ranking.js') }}"></script>
    <script src="{{ asset('/js/angular/ranking/jaoApp.ranking.rankingController.js') }}"></script>

</body>
</html>
