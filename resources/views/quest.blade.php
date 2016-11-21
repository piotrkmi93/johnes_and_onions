@extends('layouts.app')

@section('content')

    <div class="card-panel quest">
        <h1>
            @if(isset($quest -> name))
                <i class="fa fa-map" aria-hidden="true"></i> Quest: {{ $quest -> name }}
            @else
                <i class="fa fa-suitcase" aria-hidden="true"></i> Work
            @endif
        </h1>

        <h3>Time left: <span id="time-left"></span></h3>

        <div class="progress">
            <div class="determinate quest-process"></div>
        </div>

        <form
            method="POST"
            @if(isset($quest -> name))
                action="{{ route('player.quest.cancel') }}"
            @else
            action="{{ route('player.work.cancel') }}"
            @endif
        >
            {{ csrf_field() }}
            <button class="btn red waves-effect waves-light"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
        </form>
    </div>

    <script>

        $(document).ready(function () {
            var end_date = new Date('{{ $quest -> end_date }}');
            var start_date = new Date('{{ $start_date }}');

            interval = setInterval(function () {

                var now = new Date();
                var time_left = new Date(end_date - start_date - (now - start_date));
                $('#time-left').text((time_left.getUTCHours() < 10 ? '0' : '') + time_left.getUTCHours() + ':' + (time_left.getUTCMinutes() < 10 ? '0' : '') + time_left.getUTCMinutes() + ':' + (time_left.getUTCSeconds() < 10 ? '0' : '') + time_left.getUTCSeconds());
                $('.quest-process').css('width', ( ((now - start_date) * 100 ) / (end_date - start_date)) + '%');

                if (time_left < 0) {
                    clearInterval(interval);
                    window.location.reload(true);
                }

            }, 100);
        });

    </script>

@endsection
