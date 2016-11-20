@extends('layouts.app')

@section('content')

    <div class="card-panel" ng-controller="playerDetailsController as player">
        <h4>Character</h4>

        <div class="row">
            <div class="col s6">

                <div class="col s2">

                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'sword\')'
                             }"
                             ng-model="player.sword">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.sword)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.sword">
                                <img src="//player.sword.item_look.image_url//">
                            </div>
                            <span ng-if="!player.sword">sword</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'armor\')'
                             }"
                             ng-model="player.armor">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.armor)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.armor">
                                <img src="//player.armor.item_look.image_url//">
                            </div>
                            <span ng-if="!player.armor">armor</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'gloves\')'
                             }"
                             ng-model="player.gloves">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.gloves)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.gloves">
                                <img src="//player.gloves.item_look.image_url//">
                            </div>
                            <span ng-if="!player.gloves">gloves</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'boots\')'
                             }"
                             ng-model="player.boots">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.boots)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.boots">
                                <img src="//player.boots.item_look.image_url//">
                            </div>
                            <span ng-if="!player.boots">boots</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'weapon\')'
                             }"
                             ng-model="player.weapon">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.weapon)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.weapon">
                                <img src="//player.weapon.item_look.image_url//">
                            </div>
                            <span ng-if="!player.weapon">weapon</span>
                        </div>
                    </div>

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

                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'necklace\')'
                             }"
                             ng-model="player.necklace">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.necklace)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.necklace">
                                <img src="//player.necklace.item_look.image_url//">
                            </div>
                            <span ng-if="!player.necklace">necklace</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'ring\')'
                             }"
                             ng-model="player.ring">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.ring)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.ring">
                                <img src="//player.ring.item_look.image_url//">
                            </div>
                            <span ng-if="!player.ring">ring</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'accessory\')'
                             }"
                             ng-model="player.accessory">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.accessory)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.accessory">
                                <img src="//player.accessory.item_look.image_url//">
                            </div>
                            <span ng-if="!player.accessory">accessory</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'belt\')'
                             }"
                             ng-model="player.belt">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.belt)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.belt">
                                <img src="//player.belt.item_look.image_url//">
                            </div>
                            <span ng-if="!player.belt">belt</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'shield\')'
                             }"
                             ng-model="player.shield">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.shield)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.shield">
                                <img src="//player.shield.item_look.image_url//">
                            </div>
                            <span ng-if="!player.shield">shield</span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col s6 backpack-box">

                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-droppable
                         ng-model="player.backpack[index]"
                         ng-repeat="index in [1,2,3]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'player.dragStart(player.backpack[index])'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="player.backpack[index]">
                            <img src="//player.backpack[index].item_look.image_url//"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-droppable
                         ng-model="player.backpack[index]"
                         ng-repeat="index in [4,5,6]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'player.dragStart(player.backpack[index])'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="player.backpack[index]">
                            <img src="//player.backpack[index].item_look.image_url//"></div>
                    </div>
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
