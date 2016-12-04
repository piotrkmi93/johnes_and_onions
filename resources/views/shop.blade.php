@extends('layouts.app')

@section('content')
    <div class="card-panel" ng-controller="shopController as shop">

        <div class="row" ng-init="shop.init({{ $player }}, {{ $shop }})">

            <div class="col s6 backpack-box">
                <h1>
                    @if($shop -> type === "armorer")
                        <i class="fa fa-shield" aria-hidden="true"></i>
                    @elseif($shop -> type === "blacksmith")
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                    @elseif($shop -> type === "jeweler")
                        <i class="fa fa-diamond" aria-hidden="true"></i>
                    @endif
                    {{ ucfirst ($shop -> type) }}
                </h1>

                <div class="character-box">
                    <img src="{{ asset("/images/blacksmith.jpg") }}">
                </div>

                <hr>


                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-options
                         jqyoui-droppable="{
                            beforeDrop:'shop.sellItem()'
                         }"
                         ng-model="shop.shop.backpack.items[index]"
                         ng-repeat="index in [0,1,2]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'shop.dragItem(shop.shop.backpack.items[index])'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="shop.shop.backpack.items[index]">
                            <img src="//shop.shop.backpack.items[index].item.item_look.image_url ? '../' + shop.shop.backpack.items[index].item.item_look.image_url : ''//"></div>
                        <div class="item-box-info" ng-if="shop.shop.backpack.items[index].item">
                            <span>//shop.shop.backpack.items[index].item.name//</span><br>
                            <span>Type: //shop.shop.backpack.items[index].item.type//</span><br>
                            <span ng-if="shop.shop.backpack[index].armor_points !== 0">Armor: //shop.shop.backpack.items[index].item.armor_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].strength_points !== 0">Strength: //shop.shop.backpack.items[index].item.strength_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].dexterity_points !== 0">Dexterity: //shop.shop.backpack.items[index].item.dexterity_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].intelligence_points !== 0">Intelligence: //shop.shop.backpack.items[index].item.intelligence_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].durability_points !== 0">Durability: //shop.shop.backpack.items[index].item.durability_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].lucky_points !== 0">Luck: //shop.shop.backpack.items[index].item.lucky_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].damage_min_points !== 0">Min damage points: //shop.shop.backpack.items[index].item.damage_min_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].damage_max_points !== 0">Max damage points: //shop.shop.backpack.items[index].item.damage_max_points//<br></span>
                            <span>Price: //shop.shop.backpack.items[index].item.price//</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-options
                         jqyoui-droppable="{
                            beforeDrop:'shop.sellItem()'
                         }"
                         ng-model="shop.shop.backpack.items[index]"
                         ng-repeat="index in [3,4,5]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'shop.dragItem(shop.shop.backpack.items[index])'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                             ng-model="shop.shop.backpack.items[index]">
                            <img src="//shop.shop.backpack.items[index].item.item_look.image_url ? '../' + shop.shop.backpack.items[index].item.item_look.image_url : ''//"></div>
                        <div class="item-box-info" ng-if="shop.shop.backpack.items[index].item">
                            <span>//shop.shop.backpack.items[index].item.name//</span><br>
                            <span>Type: //shop.shop.backpack.items[index].item.type//</span><br>
                            <span ng-if="shop.shop.backpack[index].armor_points !== 0">Armor: //shop.shop.backpack.items[index].item.armor_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].strength_points !== 0">Strength: //shop.shop.backpack.items[index].item.strength_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].dexterity_points !== 0">Dexterity: //shop.shop.backpack.items[index].item.dexterity_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].intelligence_points !== 0">Intelligence: //shop.shop.backpack.items[index].item.intelligence_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].durability_points !== 0">Durability: //shop.shop.backpack.items[index].item.durability_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].lucky_points !== 0">Luck: //shop.shop.backpack.items[index].item.lucky_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].damage_min_points !== 0">Min damage points: //shop.shop.backpack.items[index].item.damage_min_points//<br></span>
                            <span ng-if="shop.shop.backpack[index].damage_max_points !== 0">Max damage points: //shop.shop.backpack.items[index].item.damage_max_points//<br></span>
                            <span>Price: //shop.shop.backpack.items[index].item.price//</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col s6 backpack-box">
                <h1><i class="fa fa-user" aria-hidden="true"></i> {{ $player -> character -> name }} </h1>

                <div class="character-box">
                    <img src="{{ asset($player->character->characterLook->bodyVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->headVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->eyebrowVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->eyesVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->hairVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->noseVariant->image_url) }}">
                    <img src="{{ asset($player->character->characterLook->mouthVariant->image_url) }}">
                </div>

                <hr>

                <div class="row">
                    <div class="item-box"
                         data-drop="true"
                         jqyoui-options
                         jqyoui-droppable="{
                            beforeDrop:'shop.buyItem()'
                         }"
                         ng-model="shop.player.backpack.items[index]"
                         ng-repeat="index in [0,1,2]">
                        <div data-drag="true"
                             jqyoui-draggable="{
                                animate:true,
                                onStart:'shop.dragItem(shop.player.backpack.items[index])'
                             }"
                             data-jqyoui-options="{revert: 'invalid'}"
                            ng-model="shop.player.backpack.items[index]">
                        <img src="//shop.player.backpack.items[index].item.item_look.image_url ? '../' + shop.player.backpack.items[index].item.item_look.image_url : ''//"></div>
                    <div class="item-box-info" ng-if="shop.player.backpack.items[index].item">
                        <span>//shop.player.backpack.items[index].item.name//</span><br>
                        <span>Type: //shop.player.backpack.items[index].item.type//</span><br>
                        <span ng-if="shop.player.backpack[index].armor_points !== 0">Armor: //shop.player.backpack.items[index].item.armor_points//<br></span>
                        <span ng-if="shop.player.backpack[index].strength_points !== 0">Strength: //shop.player.backpack.items[index].item.strength_points//<br></span>
                        <span ng-if="shop.player.backpack[index].dexterity_points !== 0">Dexterity: //shop.player.backpack.items[index].item.dexterity_points//<br></span>
                        <span ng-if="shop.player.backpack[index].intelligence_points !== 0">Intelligence: //shop.player.backpack.items[index].item.intelligence_points//<br></span>
                        <span ng-if="shop.player.backpack[index].durability_points !== 0">Durability: //shop.player.backpack.items[index].item.durability_points//<br></span>
                        <span ng-if="shop.player.backpack[index].lucky_points !== 0">Luck: //shop.player.backpack.items[index].item.lucky_points//<br></span>
                        <span ng-if="shop.player.backpack[index].damage_min_points !== 0">Min damage points: //shop.player.backpack.items[index].item.damage_min_points//<br></span>
                        <span ng-if="shop.player.backpack[index].damage_max_points !== 0">Max damage points: //shop.player.backpack.items[index].item.damage_max_points//<br></span>
                        <span>Price: //shop.player.backpack.items[index].item.price//</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item-box"
                     data-drop="true"
                     jqyoui-options
                     jqyoui-droppable="{
                            beforeDrop:'shop.buyItem()'
                         }"
                     ng-model="shop.player.backpack.items[index]"
                     ng-repeat="index in [3,4,5]">
                    <div data-drag="true"
                         jqyoui-draggable="{
                                animate:true,
                                onStart:'shop.dragItem(shop.player.backpack.items[index])'
                             }"
                         data-jqyoui-options="{revert: 'invalid'}"
                         ng-model="shop.player.backpack.items[index]">
                        <img src="//shop.player.backpack.items[index].item.item_look.image_url ? '../' + shop.player.backpack.items[index].item.item_look.image_url : ''//"></div>
                    <div class="item-box-info" ng-if="shop.player.backpack.items[index].item">
                        <span>//shop.player.backpack.items[index].item.name//</span><br>
                        <span>Type: //shop.player.backpack.items[index].item.type//</span><br>
                        <span ng-if="shop.player.backpack[index].armor_points !== 0">Armor: //shop.player.backpack.items[index].item.armor_points//<br></span>
                        <span ng-if="shop.player.backpack[index].strength_points !== 0">Strength: //shop.player.backpack.items[index].item.strength_points//<br></span>
                        <span ng-if="shop.player.backpack[index].dexterity_points !== 0">Dexterity: //shop.player.backpack.items[index].item.dexterity_points//<br></span>
                        <span ng-if="shop.player.backpack[index].intelligence_points !== 0">Intelligence: //shop.player.backpack.items[index].item.intelligence_points//<br></span>
                        <span ng-if="shop.player.backpack[index].durability_points !== 0">Durability: //shop.player.backpack.items[index].item.durability_points//<br></span>
                        <span ng-if="shop.player.backpack[index].lucky_points !== 0">Luck: //shop.player.backpack.items[index].item.lucky_points//<br></span>
                        <span ng-if="shop.player.backpack[index].damage_min_points !== 0">Min damage points: //shop.player.backpack.items[index].item.damage_min_points//<br></span>
                        <span ng-if="shop.player.backpack[index].damage_max_points !== 0">Max damage points: //shop.player.backpack.items[index].item.damage_max_points//<br></span>
                        <span>Price: //shop.player.backpack.items[index].item.price//</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection