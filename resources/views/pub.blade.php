@extends('layouts.app')

@section('content')

    <div class="card-panel">
        <h2><i class="fa fa-beer"></i> Pub</h2>
        <h5>Choose quest and go for adventure!</h5>
        <hr>

        <div class="row">
            @foreach($quests as $quest)

                <div class="col s4">
                    <div class="card-panel">

                        <h5>{{ $quest -> name }}</h5>

                        <p><i class="fa fa-plus-circle" aria-hidden="true"></i> <strong>Experience:</strong> {{ $quest -> experience_points_reward }}</p>
                        <p><i class="fa fa-database" aria-hidden="true"></i> <strong>Gold:</strong> {{ $quest -> amount_of_gold_reward }}</p>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <strong>Duration:</strong> {{ gmdate('i:s', $quest -> duration) }}</p>

                        @if( $quest -> item_reward_id )
                            <strong>Item:</strong>
                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s6">
                                        <img src="{{ asset($quest->itemReward->itemLook->image_url) }}">
                                    </div>
                                    <div class="col s6">
                                        <strong>{{ $quest -> itemReward -> name }}</strong>
                                        <ul>
                                            <li>Type: {{ $quest -> itemReward -> type }}</li>
                                            @if($quest->itemReward->armor_points)<li>Armor points: {{ $quest->itemReward->armor_points }}</li>@endif
                                            @if($quest->itemReward->strength_points)<li>Strength points: {{ $quest->itemReward->strength_points }}</li>@endif
                                            @if($quest->itemReward->dexterity_points)<li>Dexterity points: {{ $quest->itemReward->dexterity_points }}</li>@endif
                                            @if($quest->itemReward->intelligence_points)<li>Intelligence points: {{ $quest->itemReward->intelligence_points }}</li>@endif
                                            @if($quest->itemReward->durability_points)<li>Durability points: {{ $quest->itemReward->durability_points }}</li>@endif
                                            @if($quest->itemReward->lucky_points)<li>Lucky points: {{ $quest->itemReward->lucky_points }}</li>@endif
                                            @if($quest->itemReward->damage_min_points && $quest->itemReward->damage_max_points)<li>Damage points: {{ $quest->itemReward->damage_min_points }} - {{ $quest->itemReward->damage_max_points }}</li>@endif
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        @endif

                        <a href="{{ route('player.pub', ['quest' => $quest -> id]) }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-plane" aria-hidden="true"></i> <strong>Go!</strong></a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
