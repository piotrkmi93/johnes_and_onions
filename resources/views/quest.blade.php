@extends('layouts.app')

@section('content')

    <div class="card-panel quest">
        <h1>{{ $quest -> name }}</h1>

        <div class="progress">
            <div class="determinate quest-process"></div>
        </div>
    </div>

    {{--<script>--}}

        {{--var endtime = new Date({{ $quest -> end_time }});--}}



        {{--$('.quest-process').css('width', 50%);--}}

    {{--</script>--}}

@endsection
