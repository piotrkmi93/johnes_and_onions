@extends('layouts.app')

@section('content')

    <div class="card-panel quest">
        <h1>Quest: {{ $quest -> name }}</h1>

        <h3>Time left: <span id="time-left"></span></h3>

        <div class="progress">
            <div class="determinate quest-process"></div>
        </div>
    </div>

    <script>

        var end_date = new Date('{{ $quest -> end_date }}');
        var start_date = new Date('{{ $start_date }}');

        interval = setInterval(function(){

            var now = new Date();
            var time_left = new Date(end_date - start_date - (now - start_date));
            $('#time-left').text(time_left.getUTCMinutes() + ':' + (time_left.getUTCSeconds() < 10 ? '0' : '') + time_left.getUTCSeconds());
            $('.quest-process').css('width', ( ((now - start_date) * 100 ) / (end_date - start_date)) + '%');

            console.log(time_left < 0);

            if(time_left < 0)
            {
                clearInterval(interval);
                window.location.reload(true);
            }

        }, 1000);

    </script>

@endsection
