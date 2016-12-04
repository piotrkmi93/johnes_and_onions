<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    public $timestamps = false;

    public function character(){
        return $this -> belongsTo(Character::class);
    }

    public function statistics(){
        $character = $this -> character;

        $statistics = array(
            'strength_points' => $character -> strength_points,
            'dexterity_points' => $character -> dexterity_points,
            'intelligence_points' => $character -> intelligence_points,
            'durability_points' => $character -> durability_points,
            'lucky_points' => $character -> lucky_points,
            'armor_points' => $this -> armor_points,
            'damage_min_points' => $this -> damage_min_points,
            'damage_max_points' => $this -> damage_max_points,
            'attack_type' => $this -> attack_type,
        );

        return $statistics;
    }
}
