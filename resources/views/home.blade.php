@extends('layouts.app')

@section('content')

    @if(isPlayable())
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Playable: {{ isPlayable() ? 'true' : 'false' }}
                </div>
            </div>
    @else
        @include('partials.creator')
    @endif

@endsection
