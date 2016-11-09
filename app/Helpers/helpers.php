<?php

if ( ! function_exists('isPlayabe')){

    function isPlayable(){
        $player = \App\Player::where('user_id', \Illuminate\Support\Facades\Auth::user()->id) -> first();
        return isset($player);
    }

};

if ( ! function_exists('getPlayerQuickInfo') ){

    function getPlayerQuickInfo(){
        $user = \Illuminate\Support\Facades\Auth::user();
        $player = \App\Player::where('user_id', $user->id)->first();
        $character = \App\Character::find($player->character_id);
        // TODO
    }

}