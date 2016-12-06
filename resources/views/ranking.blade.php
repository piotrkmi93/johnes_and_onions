@extends('layouts.app')

@section('content')
<ng-controller ng-controller="rankingController as ranking">
    <div class="col s6">
        <div class="card-panel quest">
            <h1>Ranking</h1>

            <table class="highlight responsive-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Glory points</th>
                </tr>
                </thead>

                <tbody>

                @foreach($ranking as $place => $player)
                    <tr class="ranking-row"
                        ng-click="ranking.setPlayerId({{ $player -> id }})"
                        ng-class="{'ranking-row-selected': ranking.playerId === {{ $player -> id }} }">
                        <td>{{ $place + 1 }}</td>
                        <td>{{ $player -> character -> name }}</td>
                        <td>{{ $player -> character -> level }}</td>
                        <td>{{ $player -> glory_points }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="col s6">
        <div class="card-panel quest">
            <div class="card-panel">
                <div class="text-center">
                    <h3>// ranking.player.character.name //</h3>
                </div>

                <div class="character-box" ng-if="ranking.player">
                    <img src="//ranking.player.character.character_look.body_variant.image_url//">
                    <img src="//ranking.player.character.character_look.head_variant.image_url//">
                    <img src="//ranking.player.character.character_look.eyebrow_variant.image_url//">
                    <img src="//ranking.player.character.character_look.eyes_variant.image_url//">
                    <img src="//ranking.player.character.character_look.hair_variant.image_url//">
                    <img src="//ranking.player.character.character_look.nose_variant.image_url//">
                    <img src="//ranking.player.character.character_look.mouth_variant.image_url//">
                </div>

                <div class="text-center" ng-if="ranking.player">
                    <h4>//ranking.roundHealth(ranking.hitPoints())//</h4>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                    <hr>
                    <p>Strength points: //ranking.calculateStrength()//</p>
                    <p>Dexterity points: //ranking.calculateDexterity()//</p>
                    <p>Intelligence points: //ranking.calculateIntelligence()//</p>
                    <p>Durability points: //ranking.calculateDurability()//</p>
                    <p>Luck points: //ranking.calculateLuck()//</p>
                </div>

            </div>
        </div>
    </div>
</ng-controller>

@endsection