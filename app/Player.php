<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;

    public function character()
    {
        return $this -> belongsTo(Character::class);
    }

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function weapon(){
        return $this -> belongsTo(Item::class);
    }

    public function shield(){
        return $this -> belongsTo(Item::class);
    }

    public function helmet(){
        return $this -> belongsTo(Item::class);
    }

    public function armor(){
        return $this -> belongsTo(Item::class);
    }

    public function gloves(){
        return $this -> belongsTo(Item::class);
    }

    public function belt(){
        return $this -> belongsTo(Item::class);
    }

    public function boots(){
        return $this -> belongsTo(Item::class);
    }

    public function necklace(){
        return $this -> belongsTo(Item::class);
    }

    public function ring(){
        return $this -> belongsTo(Item::class);
    }

    public function accessory(){
        return $this -> belongsTo(Item::class);
    }

    public function backpack(){
        return $this -> belongsTo(Backpack::class);
    }

    public function getStatistics(){

        $character = $this -> character;

        $statistics = array(
            'strength_points' => $character -> strength_points,
            'dexterity_points' => $character -> dexterity_points,
            'intelligence_points' => $character -> intelligence_points,
            'durability_points' => $character -> durability_points,
            'lucky_points' => $character -> lucky_points,
            'armor_points' => 0,
            'damage_min_points' => 0,
            'damage_max_points' => 0,
        );

        if( $this->accessory ){
            $statistics['strength_points'] += $this->accessory -> strength_points;
            $statistics['dexterity_points'] += $this->accessory -> dexterity_points;
            $statistics['intelligence_points'] += $this->accessory -> intelligence_points;
            $statistics['durability_points'] += $this->accessory -> durability_points;
            $statistics['lucky_points'] += $this->accessory -> lucky_points;
            $statistics['armor_points'] += $this->accessory -> armor_points;
        }

        if( $this->ring ){
            $statistics['strength_points'] += $this->ring -> strength_points;
            $statistics['dexterity_points'] += $this->ring -> dexterity_points;
            $statistics['intelligence_points'] += $this->ring -> intelligence_points;
            $statistics['durability_points'] += $this->ring -> durability_points;
            $statistics['lucky_points'] += $this->ring -> lucky_points;
            $statistics['armor_points'] += $this->ring -> armor_points;
        }

        if( $this->necklace ){
            $statistics['strength_points'] += $this->necklace -> strength_points;
            $statistics['dexterity_points'] += $this->necklace -> dexterity_points;
            $statistics['intelligence_points'] += $this->necklace -> intelligence_points;
            $statistics['durability_points'] += $this->necklace -> durability_points;
            $statistics['lucky_points'] += $this->necklace -> lucky_points;
            $statistics['armor_points'] += $this->necklace -> armor_points;
        }

        if( $this->boots ){
            $statistics['strength_points'] += $this->boots -> strength_points;
            $statistics['dexterity_points'] += $this->boots -> dexterity_points;
            $statistics['intelligence_points'] += $this->boots -> intelligence_points;
            $statistics['durability_points'] += $this->boots -> durability_points;
            $statistics['lucky_points'] += $this->boots -> lucky_points;
            $statistics['armor_points'] += $this->boots -> armor_points;
        }

        if( $this->belt ){
            $statistics['strength_points'] += $this->belt -> strength_points;
            $statistics['dexterity_points'] += $this->belt -> dexterity_points;
            $statistics['intelligence_points'] += $this->belt -> intelligence_points;
            $statistics['durability_points'] += $this->belt -> durability_points;
            $statistics['lucky_points'] += $this->belt -> lucky_points;
            $statistics['armor_points'] += $this->belt -> armor_points;
        }

        if( $this->gloves ){
            $statistics['strength_points'] += $this->gloves -> strength_points;
            $statistics['dexterity_points'] += $this->gloves -> dexterity_points;
            $statistics['intelligence_points'] += $this->gloves -> intelligence_points;
            $statistics['durability_points'] += $this->gloves -> durability_points;
            $statistics['lucky_points'] += $this->gloves -> lucky_points;
            $statistics['armor_points'] += $this->gloves -> armor_points;
        }

        if( $this->armor ){
            $statistics['strength_points'] += $this->armor -> strength_points;
            $statistics['dexterity_points'] += $this->armor -> dexterity_points;
            $statistics['intelligence_points'] += $this->armor -> intelligence_points;
            $statistics['durability_points'] += $this->armor -> durability_points;
            $statistics['lucky_points'] += $this->armor -> lucky_points;
            $statistics['armor_points'] += $this->armor -> armor_points;
        }

        if( $this->helmet ){
            $statistics['strength_points'] += $this->helmet -> strength_points;
            $statistics['dexterity_points'] += $this->helmet -> dexterity_points;
            $statistics['intelligence_points'] += $this->helmet -> intelligence_points;
            $statistics['durability_points'] += $this->helmet -> durability_points;
            $statistics['lucky_points'] += $this->helmet -> lucky_points;
            $statistics['armor_points'] += $this->helmet -> armor_points;
        }

        if( $this->shield ){
            $statistics['strength_points'] += $this->shield -> strength_points;
            $statistics['dexterity_points'] += $this->shield -> dexterity_points;
            $statistics['intelligence_points'] += $this->shield -> intelligence_points;
            $statistics['durability_points'] += $this->shield -> durability_points;
            $statistics['lucky_points'] += $this->shield -> lucky_points;
            $statistics['armor_points'] += $this->shield -> armor_points;
        }

        if( $this->weapon ){
            $statistics['strength_points'] += $this->weapon -> strength_points;
            $statistics['dexterity_points'] += $this->weapon -> dexterity_points;
            $statistics['intelligence_points'] += $this->weapon -> intelligence_points;
            $statistics['durability_points'] += $this->weapon -> durability_points;
            $statistics['lucky_points'] += $this->weapon -> lucky_points;
            $statistics['armor_points'] += $this->weapon -> armor_points;
            $statistics['damage_min_points'] = $this->weapon -> damage_min_points * (1 + $statistics['strength_points'] / 10);
            $statistics['damage_max_points'] = $this->weapon -> damage_max_points * (1 + $statistics['strength_points'] / 10);
        }

        return $statistics;
    }
}
