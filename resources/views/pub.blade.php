@extends('layouts.app')

@section('content')

    <div class="card-panel">
        <h4>Pub</h4>

        <div class="row">
            @foreach($quests as $quest)

                <div class="col s4">
                    <div class="card-panel">

                        <h5>{{ $quest -> name }}</h5>

                        <p><i class="fa fa-plus-circle" aria-hidden="true"></i> <strong>Experience:</strong> {{ $quest -> experience_points_reward }}</p>
                        <p><i class="fa fa-database" aria-hidden="true"></i> <strong>Gold:</strong> {{ $quest -> amount_of_gold_reward }}</p>

                        @if( $quest -> item_reward_id )
                            {{-- TODO --}}
                        @endif

                        <a href="#" class="waves-effect waves-light btn btn-lg"><i class="fa fa-plane" aria-hidden="true"></i> <strong>Go!</strong></a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
