@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s5">
            <div class="card-panel">
                <div class="text-center">
                    <h3>{{ $player_1 -> character -> name }}</h3>
                </div>

                <div class="character-box">
                    <img src="{{ asset($player_1->character->characterLook->bodyVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->headVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->eyebrowVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->eyesVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->hairVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->noseVariant->image_url) }}">
                    <img src="{{ asset($player_1->character->characterLook->mouthVariant->image_url) }}">
                </div>

                <div class="text-center">
                    <h4>{{ $player_1 -> statistics()['durability_points'] * 5 * ($player_1->character->level + 1) }} / {{ $player_1 -> statistics()['durability_points'] * 5 * ($player_1->character->level + 1) }}</h4>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                    <hr>
                    <p>Strength points: {{ $player_1->statistics()['strength_points'] }}</p>
                    <p>Dexterity points: {{ $player_1->statistics()['dexterity_points'] }}</p>
                    <p>Intelligence points: {{ $player_1->statistics()['intelligence_points'] }}</p>
                    <p>Durability points: {{ $player_1->statistics()['durability_points'] }}</p>
                    <p>Luck points: {{ $player_1->statistics()['luck_points'] }}</p>
                </div>

            </div>
        </div>

        @if(isset($player_2))
            <div class="col s2 text-center versus">
                <div class="card-panel">
                    <h1>VS</h1>
                </div>
            </div>

            <div class="col s5">
                <div class="card-panel">
                    <div class="text-center">
                        <h3>{{ $player_2 -> character -> name }}</h3>
                    </div>

                    <div class="character-box opponent-character-box">
                        <img src="{{ asset($player_2->character->characterLook->bodyVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->headVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->eyebrowVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->eyesVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->hairVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->noseVariant->image_url) }}">
                        <img src="{{ asset($player_2->character->characterLook->mouthVariant->image_url) }}">
                    </div>

                    <div class="text-center">
                        <h4>{{ $player_2 -> statistics()['durability_points'] * 5 * ($player_2->character->level + 1) }} / {{ $player_2 -> statistics()['durability_points'] * 5 * ($player_2->character->level + 1) }}</h4>
                        <div class="progress">
                            <div class="determinate" style="width: 100%"></div>
                        </div>
                        <hr>
                        <p>Strength points: {{ $player_2->statistics()['strength_points'] }}</p>
                        <p>Dexterity points: {{ $player_2->statistics()['dexterity_points'] }}</p>
                        <p>Intelligence points: {{ $player_2->statistics()['intelligence_points'] }}</p>
                        <p>Durability points: {{ $player_2->statistics()['durability_points'] }}</p>
                        <p>Luck points: {{ $player_2->statistics()['luck_points'] }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="col s7 text-center versus">
                <div class="card-panel">
                    <h1>You are #1!</h1>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="card-panel text-center">
            @if(isset($quest))
                <a href="{{ route('player.pub') }}" class="btn waves-effect waves-light">Skip</a>
            @elseif(isset($duel_preview) && isset($player_2))
                <a href="{{ route('player.arena', ['defender' => $player_2 -> id]) }}" class="btn waves-effect waves-light">Fight!</a>
            @elseif(isset($duel))
                <a href="{{ route('player.arena') }}" class="btn waves-effect waves-light">Back to arena</a>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function () {

            @if(isset($steps))
                var steps = JSON.parse(('{{ $steps }}').replace(/&quot;/g, '"'));
                console.log(steps);
            @endif

            @if(isset($quest) && $quest)
                $.ajax({
                    method: "POST",
                    url: "/api/player/quest/delete",
                    data: { user_id: '{{ Auth::user()->id }}' }
                })
                    .done(function( response ) {
                        console.log(response);
                    });
            @endif

        });

    </script>

@endsection
