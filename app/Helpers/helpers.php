<?php

if ( ! function_exists('isPlayabe')){

    function isPlayable(){
        $player = \App\Player::where('user_id', \Illuminate\Support\Facades\Auth::user()->id) -> first();
        return isset($player);
    }

};

if ( ! function_exists('getPlayer') ){

    function getPlayer(){
        $user = \Illuminate\Support\Facades\Auth::user();
        $player = \App\Player::where('user_id', $user->id)->first();
        return isset($player) ? $player : null;
    }

}