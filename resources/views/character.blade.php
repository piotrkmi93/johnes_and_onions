@extends('layouts.app')

@section('content')

    <div class="card-panel" ng-controller="playerDetailsController as player">
        <h1><i class="fa fa-user" aria-hidden="true"></i> Character</h1>

        <div class="row" ng-init="player.userId={{ $player -> id }}">
            <div class="col s6" ng-init="player.id={{ Auth::user() -> id }}">

                <div class="col s2">

                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'helmet\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.helmet">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.helmet, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.helmet">
                                <img src="//player.helmet.item_look.image_url//">
                            </div>
                            <span ng-if="!player.helmet">helmet</span>
                            <div class="item-box-info" ng-if="player.helmet">
                                <span>//player.helmet.name//</span><br>
                                <span>Type: //player.helmet.type//</span><br>
                                <span ng-if="player.helmet.armor_points !== 0">Armor: //player.helmet.armor_points//<br></span>
                                <span ng-if="player.helmet.strength_points !== 0">Strength: //player.helmet.strength_points//<br></span>
                                <span ng-if="player.helmet.dexterity_points !== 0">Dexterity: //player.helmet.dexterity_points//<br></span>
                                <span ng-if="player.helmet.intelligence_points !== 0">Intelligence: //player.helmet.intelligence_points//<br></span>
                                <span ng-if="player.helmet.durability_points !== 0">Durability: //player.helmet.durability_points//<br></span>
                                <span ng-if="player.helmet.lucky_points !== 0">Luck: //player.helmet.lucky_points//<br></span>
                                <span ng-if="player.helmet.damage_min_points !== 0">Min damage points: //player.helmet.damage_min_points//<br></span>
                                <span ng-if="player.helmet.damage_max_points !== 0">Max damage points: //player.helmet.damage_max_points//<br></span>
                                <span>Price: //player.helmet.price//</span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'armor\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.armor">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.armor, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.armor">
                                <img src="//player.armor.item_look.image_url//">
                            </div>
                            <span ng-if="!player.armor">armor</span>
                            <div class="item-box-info" ng-if="player.armor">
                                <span>//player.armor.name//</span><br>
                                <span>Type: //player.armor.type//</span><br>
                                <span ng-if="player.armor.armor_points !== 0">Armor: //player.armor.armor_points//<br></span>
                                <span ng-if="player.armor.strength_points !== 0">Strength: //player.armor.strength_points//<br></span>
                                <span ng-if="player.armor.dexterity_points !== 0">Dexterity: //player.armor.dexterity_points//<br></span>
                                <span ng-if="player.armor.intelligence_points !== 0">Intelligence: //player.armor.intelligence_points//<br></span>
                                <span ng-if="player.armor.durability_points !== 0">Durability: //player.armor.durability_points//<br></span>
                                <span ng-if="player.armor.lucky_points !== 0">Luck: //player.armor.lucky_points//<br></span>
                                <span ng-if="player.armor.damage_min_points !== 0">Min damage points: //player.armor.damage_min_points//<br></span>
                                <span ng-if="player.armor.damage_max_points !== 0">Max damage points: //player.armor.damage_max_points//<br></span>
                                <span>Price: //player.armor.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'gloves\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.gloves">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.gloves, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.gloves">
                                <img src="//player.gloves.item_look.image_url//">
                            </div>
                            <span ng-if="!player.gloves">gloves</span>
                            <div class="item-box-info" ng-if="player.gloves">
                                <span>//player.gloves.name//</span><br>
                                <span>Type: //player.gloves.type//</span><br>
                                <span ng-if="player.gloves.armor_points !== 0">Armor: //player.gloves.armor_points//<br></span>
                                <span ng-if="player.gloves.strength_points !== 0">Strength: //player.gloves.strength_points//<br></span>
                                <span ng-if="player.gloves.dexterity_points !== 0">Dexterity: //player.gloves.dexterity_points//<br></span>
                                <span ng-if="player.gloves.intelligence_points !== 0">Intelligence: //player.gloves.intelligence_points//<br></span>
                                <span ng-if="player.gloves.durability_points !== 0">Durability: //player.gloves.durability_points//<br></span>
                                <span ng-if="player.gloves.lucky_points !== 0">Luck: //player.gloves.lucky_points//<br></span>
                                <span ng-if="player.gloves.damage_min_points !== 0">Min damage points: //player.gloves.damage_min_points//<br></span>
                                <span ng-if="player.gloves.damage_max_points !== 0">Max damage points: //player.gloves.damage_max_points//<br></span>
                                <span>Price: //player.gloves.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'boots\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.boots">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.boots, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.boots">
                                <img src="//player.boots.item_look.image_url//">
                            </div>
                            <span ng-if="!player.boots">boots</span>
                            <div class="item-box-info" ng-if="player.boots">
                                <span>//player.boots.name//</span><br>
                                <span>Type: //player.boots.type//</span><br>
                                <span ng-if="player.boots.armor_points !== 0">Armor: //player.boots.armor_points//<br></span>
                                <span ng-if="player.boots.strength_points !== 0">Strength: //player.boots.strength_points//<br></span>
                                <span ng-if="player.boots.dexterity_points !== 0">Dexterity: //player.boots.dexterity_points//<br></span>
                                <span ng-if="player.boots.intelligence_points !== 0">Intelligence: //player.boots.intelligence_points//<br></span>
                                <span ng-if="player.boots.durability_points !== 0">Durability: //player.boots.durability_points//<br></span>
                                <span ng-if="player.boots.lucky_points !== 0">Luck: //player.boots.lucky_points//<br></span>
                                <span ng-if="player.boots.damage_min_points !== 0">Min damage points: //player.boots.damage_min_points//<br></span>
                                <span ng-if="player.boots.damage_max_points !== 0">Max damage points: //player.boots.damage_max_points//<br></span>
                                <span>Price: //player.boots.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'sword_wand\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.weapon">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.weapon, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.weapon">
                                <img src="//player.weapon.item_look.image_url//">
                            </div>
                            <span ng-if="!player.weapon">weapon</span>
                            <div class="item-box-info" ng-if="player.weapon">
                                <span>//player.weapon.name//</span><br>
                                <span>Type: //player.weapon.type//</span><br>
                                <span ng-if="player.weapon.armor_points !== 0">Armor: //player.weapon.armor_points//<br></span>
                                <span ng-if="player.weapon.strength_points !== 0">Strength: //player.weapon.strength_points//<br></span>
                                <span ng-if="player.weapon.dexterity_points !== 0">Dexterity: //player.weapon.dexterity_points//<br></span>
                                <span ng-if="player.weapon.intelligence_points !== 0">Intelligence: //player.weapon.intelligence_points//<br></span>
                                <span ng-if="player.weapon.durability_points !== 0">Durability: //player.weapon.durability_points//<br></span>
                                <span ng-if="player.weapon.lucky_points !== 0">Luck: //player.weapon.lucky_points//<br></span>
                                <span ng-if="player.weapon.damage_min_points !== 0">Min damage points: //player.weapon.damage_min_points//<br></span>
                                <span ng-if="player.weapon.damage_max_points !== 0">Max damage points: //player.weapon.damage_max_points//<br></span>
                                <span>Price: //player.weapon.price//</span>
                            </div>
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
                        <span>{{ (round($player->experience_points * 100 / $player->required_experience_points)) }}% - {{ $player->required_experience_points - $player->experience_points }} exp required</span>
                    </div>

                </div>

                <div class="col s2">

                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'necklace\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.necklace">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.necklace, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.necklace">
                                <img src="//player.necklace.item_look.image_url//">
                            </div>
                            <span ng-if="!player.necklace">necklace</span>
                            <div class="item-box-info" ng-if="player.necklace">
                                <span>//player.necklace.name//</span><br>
                                <span>Type: //player.necklace.type//</span><br>
                                <span ng-if="player.necklace.armor_points !== 0">Armor: //player.necklace.armor_points//<br></span>
                                <span ng-if="player.necklace.strength_points !== 0">Strength: //player.necklace.strength_points//<br></span>
                                <span ng-if="player.necklace.dexterity_points !== 0">Dexterity: //player.necklace.dexterity_points//<br></span>
                                <span ng-if="player.necklace.intelligence_points !== 0">Intelligence: //player.necklace.intelligence_points//<br></span>
                                <span ng-if="player.necklace.durability_points !== 0">Durability: //player.necklace.durability_points//<br></span>
                                <span ng-if="player.necklace.lucky_points !== 0">Luck: //player.necklace.lucky_points//<br></span>
                                <span ng-if="player.necklace.damage_min_points !== 0">Min damage points: //player.necklace.damage_min_points//<br></span>
                                <span ng-if="player.necklace.damage_max_points !== 0">Max damage points: //player.necklace.damage_max_points//<br></span>
                                <span>Price: //player.necklace.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'ring\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.ring">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.ring, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.ring">
                                <img src="//player.ring.item_look.image_url//">
                            </div>
                            <span ng-if="!player.ring">ring</span>
                            <div class="item-box-info" ng-if="player.ring">
                                <span>//player.ring.name//</span><br>
                                <span>Type: //player.ring.type//</span><br>
                                <span ng-if="player.ring.armor_points !== 0">Armor: //player.ring.armor_points//<br></span>
                                <span ng-if="player.ring.strength_points !== 0">Strength: //player.ring.strength_points//<br></span>
                                <span ng-if="player.ring.dexterity_points !== 0">Dexterity: //player.ring.dexterity_points//<br></span>
                                <span ng-if="player.ring.intelligence_points !== 0">Intelligence: //player.ring.intelligence_points//<br></span>
                                <span ng-if="player.ring.durability_points !== 0">Durability: //player.ring.durability_points//<br></span>
                                <span ng-if="player.ring.lucky_points !== 0">Luck: //player.ring.lucky_points//<br></span>
                                <span ng-if="player.ring.damage_min_points !== 0">Min damage points: //player.ring.damage_min_points//<br></span>
                                <span ng-if="player.ring.damage_max_points !== 0">Max damage points: //player.ring.damage_max_points//<br></span>
                                <span>Price: //player.ring.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'accessory\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.accessory">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.accessory, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.accessory">
                                <img src="//player.accessory.item_look.image_url//">
                            </div>
                            <span ng-if="!player.accessory">accessory</span>
                            <div class="item-box-info" ng-if="player.accessory">
                                <span>//player.accessory.name//</span><br>
                                <span>Type: //player.accessory.type//</span><br>
                                <span ng-if="player.accessory.armor_points !== 0">Armor: //player.accessory.armor_points//<br></span>
                                <span ng-if="player.accessory.strength_points !== 0">Strength: //player.accessory.strength_points//<br></span>
                                <span ng-if="player.accessory.dexterity_points !== 0">Dexterity: //player.accessory.dexterity_points//<br></span>
                                <span ng-if="player.accessory.intelligence_points !== 0">Intelligence: //player.accessory.intelligence_points//<br></span>
                                <span ng-if="player.accessory.durability_points !== 0">Durability: //player.accessory.durability_points//<br></span>
                                <span ng-if="player.accessory.lucky_points !== 0">Luck: //player.accessory.lucky_points//<br></span>
                                <span ng-if="player.accessory.damage_min_points !== 0">Min damage points: //player.accessory.damage_min_points//<br></span>
                                <span ng-if="player.accessory.damage_max_points !== 0">Max damage points: //player.accessory.damage_max_points//<br></span>
                                <span>Price: //player.accessory.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'belt\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.belt">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.belt, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.belt">
                                <img src="//player.belt.item_look.image_url//">
                            </div>
                            <span ng-if="!player.belt">belt</span>
                            <div class="item-box-info" ng-if="player.belt">
                                <span>//player.belt.name//</span><br>
                                <span>Type: //player.belt.type//</span><br>
                                <span ng-if="player.belt.armor_points !== 0">Armor: //player.belt.armor_points//<br></span>
                                <span ng-if="player.belt.strength_points !== 0">Strength: //player.belt.strength_points//<br></span>
                                <span ng-if="player.belt.dexterity_points !== 0">Dexterity: //player.belt.dexterity_points//<br></span>
                                <span ng-if="player.belt.intelligence_points !== 0">Intelligence: //player.belt.intelligence_points//<br></span>
                                <span ng-if="player.belt.durability_points !== 0">Durability: //player.belt.durability_points//<br></span>
                                <span ng-if="player.belt.lucky_points !== 0">Luck: //player.belt.lucky_points//<br></span>
                                <span ng-if="player.belt.damage_min_points !== 0">Min damage points: //player.belt.damage_min_points//<br></span>
                                <span ng-if="player.belt.damage_max_points !== 0">Max damage points: //player.belt.damage_max_points//<br></span>
                                <span>Price: //player.belt.price//</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item-box"
                             data-drop=true
                             jqyoui-options="{revertDuration: 1000}"
                             jqyoui-droppable="{
                                beforeDrop: 'player.canDropItem(\'shield\')',
                                onDrop: 'player.drop(false)'
                             }"
                             ng-model="player.shield">
                            <div data-drag="true"
                                 jqyoui-draggable="{
                                    animate:true,
                                    onStart:'player.dragStart(player.shield, false)'
                                 }"
                                 data-jqyoui-options="{revert: 'invalid'}"
                                 ng-model="player.shield">
                                <img src="//player.shield.item_look.image_url//">
                            </div>
                            <span ng-if="!player.shield">shield</span>
                            <div class="item-box-info" ng-if="player.shield">
                                <span>//player.shield.name//</span><br>
                                <span>Type: //player.shield.type//</span><br>
                                <span ng-if="player.shield.armor_points !== 0">Armor: //player.shield.armor_points//<br></span>
                                <span ng-if="player.shield.strength_points !== 0">Strength: //player.shield.strength_points//<br></span>
                                <span ng-if="player.shield.dexterity_points !== 0">Dexterity: //player.shield.dexterity_points//<br></span>
                                <span ng-if="player.shield.intelligence_points !== 0">Intelligence: //player.shield.intelligence_points//<br></span>
                                <span ng-if="player.shield.durability_points !== 0">Durability: //player.shield.durability_points//<br></span>
                                <span ng-if="player.shield.lucky_points !== 0">Luck: //player.shield.lucky_points//<br></span>
                                <span ng-if="player.shield.damage_min_points !== 0">Min damage points: //player.shield.damage_min_points//<br></span>
                                <span ng-if="player.shield.damage_max_points !== 0">Max damage points: //player.shield.damage_max_points//<br></span>
                                <span>Price: //player.shield.price//</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col s6 backpack-box">

                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-droppable="{
                            onDrop: 'player.drop(true, //index//)'
                         }"
                         ng-model="player.backpack.items[index].item"
                         ng-repeat="index in [0,1,2]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'player.dragStart(player.backpack.items[index].item, true)'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="player.backpack.items[index].item">
                            <img src="//player.backpack.items[index].item.item_look.image_url//"></div>
                        <div class="item-box-info" ng-if="player.backpack.items[index].item">
                            <span>//player.backpack.items[index].item.name//</span><br>
                            <span>Type: //player.backpack.items[index].item.type//</span><br>
                            <span ng-if="player.backpack[index].armor_points !== 0">Armor: //player.backpack.items[index].item.armor_points//<br></span>
                            <span ng-if="player.backpack[index].strength_points !== 0">Strength: //player.backpack.items[index].item.strength_points//<br></span>
                            <span ng-if="player.backpack[index].dexterity_points !== 0">Dexterity: //player.backpack.items[index].item.dexterity_points//<br></span>
                            <span ng-if="player.backpack[index].intelligence_points !== 0">Intelligence: //player.backpack.items[index].item.intelligence_points//<br></span>
                            <span ng-if="player.backpack[index].durability_points !== 0">Durability: //player.backpack.items[index].item.durability_points//<br></span>
                            <span ng-if="player.backpack[index].lucky_points !== 0">Luck: //player.backpack.items[index].item.lucky_points//<br></span>
                            <span ng-if="player.backpack[index].damage_min_points !== 0">Min damage points: //player.backpack.items[index].item.damage_min_points//<br></span>
                            <span ng-if="player.backpack[index].damage_max_points !== 0">Max damage points: //player.backpack.items[index].item.damage_max_points//<br></span>
                            <span>Price: //player.backpack.items[index].item.price//</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-droppable="{
                            onDrop: 'player.drop(true, //index//)'
                         }"
                         ng-model="player.backpack.items[index].item"
                         ng-repeat="index in [3,4,5]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'player.dragStart(player.backpack.items[index].item, true)'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="player.backpack.items[index].item">
                            <img src="//player.backpack.items[index].item.item_look.image_url//"></div>
                        <div class="item-box-info" ng-if="player.backpack.items[index].item">
                            <span>//player.backpack.items[index].item.name//</span><br>
                            <span>Type: //player.backpack.items[index].item.type//</span><br>
                            <span ng-if="player.backpack[index].armor_points !== 0">Armor: //player.backpack.items[index].item.armor_points//<br></span>
                            <span ng-if="player.backpack[index].strength_points !== 0">Strength: //player.backpack.items[index].item.strength_points//<br></span>
                            <span ng-if="player.backpack[index].dexterity_points !== 0">Dexterity: //player.backpack.items[index].item.dexterity_points//<br></span>
                            <span ng-if="player.backpack[index].intelligence_points !== 0">Intelligence: //player.backpack.items[index].item.intelligence_points//<br></span>
                            <span ng-if="player.backpack[index].durability_points !== 0">Durability: //player.backpack.items[index].item.durability_points//<br></span>
                            <span ng-if="player.backpack[index].lucky_points !== 0">Luck: //player.backpack.items[index].item.lucky_points//<br></span>
                            <span ng-if="player.backpack[index].damage_min_points !== 0">Min damage points: //player.backpack.items[index].item.damage_min_points//<br></span>
                            <span ng-if="player.backpack[index].damage_max_points !== 0">Max damage points: //player.backpack.items[index].item.damage_max_points//<br></span>
                            <span>Price: //player.backpack.items[index].item.price//</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <div class="col s6">
                        <p>Strength points: //player.strength_points// <button class="waves-effect waves-light btn" ng-click="player.increase('strength')"><i class="fa fa-plus"></i></button></p>
                        <p>Dexterity points: //player.dexterity_points// <button class="waves-effect waves-light btn" ng-click="player.increase('dexterity')"><i class="fa fa-plus"></i></button></p>
                        <p>Intelligence points: //player.intelligence_points// <button class="waves-effect waves-light btn" ng-click="player.increase('intelligence')"><i class="fa fa-plus"></i></button></p>
                        <p>Durability points: //player.durability_points// <button class="waves-effect waves-light btn" ng-click="player.increase('durability')"><i class="fa fa-plus"></i></button></p>
                        <p>Luck points: //player.lucky_points// <button class="waves-effect waves-light btn" ng-click="player.increase('luck')"><i class="fa fa-plus"></i></button></p>
                    </div>

                    <div class="col s6">
                        <p>Damage: //player.minDamage()// ~ //player.maxDamage()//</p>
                        <p>Ability to evade: //player.abilityToEvade()//</p>
                        <p>Magic resistance: //player.magicResistance()//</p>
                        <p>Hit points: //player.hitPoints()//</p>
                        <p>Critical chance: //player.criticalChance()//</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
