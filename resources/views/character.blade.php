@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Character</div>

        <div class="row">
            <div class="col-md-6">

                <div class="col-md-2 text-center">

                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>

                </div>

                <div class="col-md-8 text-center">

                    <div class="row">
                        <div class="character-box">
                            <img src="{{ asset($player->character->characterLook->bodyVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->headVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->eyebrowVariant->image_url) }}">
                            <img src="{{ asset($player->character->characterLook->eyesVariant->image_url) }}">
                            {{--<img ng-src="//player.eyebrow.image_url//" >--}}
                            {{--<img ng-src="//player.eyes.image_url//">--}}
                            {{--<img ng-src="//player.hair.image_url//">--}}
                            {{--<img src="{{ asset('images/nose1.png') }}">--}}
                            {{--<img src="{{ asset('images/mouth1.png') }}">--}}
                        </div>
                    </div>
                    <div class="row text-center">
                        <h3>{{ $player->character->name }}</h3>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ ($player->experience_points * 100) / $player->required_experience_points }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ (getPlayer()->experience_points * 100) / getPlayer()->required_experience_points }}%"></div>
                            <span>Level {{ $player->character->level }}</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-2 text-center">

                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>
                    <div class="row"><div class="item-box"></div></div>

                </div>

            </div>
        </div>

    </div>

@endsection
