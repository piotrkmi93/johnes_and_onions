@extends('layouts.app')

@section('content')

    <div class="card-panel quest">

        <h1>Work</h1>

        @if(isset($gold))
            <div class="card-panel teal lighten-2"><i class="fa fa-check" aria-hidden="true"></i> You earned {{ $gold }} gold!</div>
        @endif

        <form method="POST" action="{{ route('player.work.start') }}" class="text-center">
            {{ csrf_field() }}
            <p class="range-field">
                <h4 for="hours">Go to work for <strong id="hours_val"></strong> hours, you earn <strong id="gold_val"></strong> gold</h4>
                <input type="range" id="hours" name="hours" min="1" max="10" value="1" />
            </p>

            <button class="btn waves-effect waves-light" type="submit">Go to work</button>
        </form>

    </div>

    <script>

        $(document).ready(function () {

            var gold = {{ floor($player -> required_experience_points / 10) }};

            $('#hours_val').text($('#hours').val());
            $('#gold_val').text($('#hours').val() * gold);

            $('#hours').change(function(){
                $('#hours_val').text($('#hours').val());
                $('#gold_val').text($('#hours').val() * gold);
            });

        });

    </script>

@endsection