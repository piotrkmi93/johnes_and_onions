<?php

if ( ! function_exists('isPlayabe')){

    function isPlayable(){
        $player = \App\Player::where('user_id', \Illuminate\Support\Facades\Auth::user()->id) -> first();
        return isset($player);
    }

};