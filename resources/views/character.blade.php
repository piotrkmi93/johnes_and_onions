@extends('layouts.app')

@section('content')

    <div class="card-panel">
        <h4>Character</h4>

        <div class="row">
            <div class="col s6">

                <div class="col s2">

                    <div class="row"><div class="item-box">helmet slot</div></div>
                    <div class="row"><div class="item-box">armor slot</div></div>
                    <div class="row"><div class="item-box">gloves slot</div></div>
                    <div class="row"><div class="item-box">boots slot</div></div>
                    <div class="row"><div class="item-box">weapon slot</div></div>

                </div>

                <div class="col s8">

                    <div class="row">
                        <div class="character-box">
                            <img src="{{ asset($player->character->characterLook->bodyVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->headVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->eyebrowVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->eyesVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->hairVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->noseVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->mouthVariant->image_url) }}">
                        </div>
                    </div>
                    <div class="row character-box-info">
                        <h3>{{ $player->character->name }}</h3>
                        <strong>Level {{ getPlayer()->character->level }}</strong>
                        <div class="progress">
                            <div class="determinate" style="width: {{ ($player->experience_points * 100) / $player->required_experience_points }}%"></div>
                        </div>
                        <span>{{ ($player->experience_points * 100) / $player->required_experience_points }}% - {{ $player->required_experience_points - $player->experience_points }} exp required</span>
                    </div>

                </div>

                <div class="col s2">

                    <div class="row"><div class="item-box">necklace slot</div></div>
                    <div class="row"><div class="item-box">ring slot</div></div>
                    <div class="row"><div class="item-box">accessory slot</div></div>
                    <div class="row"><div class="item-box">belt slot</div></div>
                    <div class="row"><div class="item-box">shield slot</div></div>

                </div>

            </div>

            <div class="col s6 backpack-box">

                <div class="row">
                    <div class="item-box"></div>
                    <div class="item-box"></div>
                    <div class="item-box"></div>
                </div>
                <div class="row">
                    <div class="item-box"></div>
                    <div class="item-box"></div>
                    <div class="item-box"></div>
                </div>

                <hr>

                <div class="row">

                    <div class="col s6">
                        <p>Strength points: {{ $player->getStatistics()['strength_points'] }} <button class="waves-effect waves-light btn"><i class="fa fa-plus"></i></button></p>
                        <p>Dexterity points: {{ $player->getStatistics()['dexterity_points'] }} <button class="waves-effect waves-light btn"><i class="fa fa-plus"></i></button></p>
                        <p>Intelligence points: {{ $player->getStatistics()['intelligence_points'] }} <button class="waves-effect waves-light btn"><i class="fa fa-plus"></i></button></p>
                        <p>Durability points: {{ $player->getStatistics()['durability_points'] }} <button class="waves-effect waves-light btn"><i class="fa fa-plus"></i></button></p>
                        <p>Luck points: {{ $player->getStatistics()['luck_points'] }} <button class="waves-effect waves-light btn"><i class="fa fa-plus"></i></button></p>
                    </div>

                    <div class="col s6">
                        <p>Damage: {{ $player->getStatistics()['damage_min_points'] }} ~ {{ $player->getStatistics()['damage_max_points'] }}</p>
                        <p>Ability to evade: {{ $player->getStatistics()['dexterity_points'] / 2 }}</p>
                        <p>Magic resistance: {{ $player->getStatistics()['intelligence_points'] / 2 }}</p>
                        <p>Hit points: {{ $player->getStatistics()['durability_points'] * 5 * ($player->character->level + 1) }}</p>
                        <p>Critical chance: {{ $player->getStatistics()['luck_points'] * 5 / ($player->character->level * 2) }}</p>
                    </div>

                </div>

            </div>
        </div>



    </div>

@endsection
