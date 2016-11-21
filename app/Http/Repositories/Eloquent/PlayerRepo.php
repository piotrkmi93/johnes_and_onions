<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 19.10.2016
 * Time: 16:21
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IPlayerRepo;
use App\Player;
use Illuminate\Support\Facades\DB;

class PlayerRepo implements IPlayerRepo
{

    private $model;

    public function __construct(Player $model)
    {
        $this -> model = $model;
    }

    public function create($user_id, $character_id, $backpack_id)
    {
        $player = $this -> model -> newInstance();
        $player -> user_id = $user_id;
        $player -> character_id = $character_id;
        $player -> backpack_id = $backpack_id;
        return $this -> save($player);
    }

    public function updateDescription($id, $description)
    {
        $player = $this -> get($id);
        $player -> description = $description;
        return $this -> save($player);
    }

    public function addExperience($id, $experience_points)
    {
        $player = $this -> get($id);
        $player -> experience_points += $experience_points;

        if($player -> experience_points >= $player -> required_experience_points) {
            $player -> experience_points += $experience_points;

//            while ($player -> required_experience_points < $player -> experience_points)
//            {
//                $this -> incrementLevel($player);
//
//            }
        }

        return $this -> save($player);
    }

    public function addGloryPoints($id, $glory_points)
    {
        $player = $this -> get($id);
        $player -> glory_points += $glory_points;
        return $this -> save($player);
    }

    public function addGold($id, $amount_of_gold)
    {
        $player = $this -> get($id);
        $player -> amount_of_gold += $amount_of_gold;
        return $this -> save($player);
    }

    public function setWeapon($id, $weapon_id)
    {
        $player = $this -> get($id);
        $player -> weapon_id = $weapon_id;
        return $this -> save($player);
    }

    public function setShield($id, $shield_id)
    {
        $player = $this -> get($id);
        $player -> shield_id = $shield_id;
        return $this -> save($player);
    }

    public function setHelmet($id, $helmet_id)
    {
        $player = $this -> get($id);
        $player -> helmet_id = $helmet_id;
        return $this -> save($player);
    }

    public function setArmor($id, $armor_id)
    {
        $player = $this -> get($id);
        $player -> armor_id = $armor_id;
        return $this -> save($player);
    }

    public function setGloves($id, $gloves_id)
    {
        $player = $this -> get($id);
        $player -> gloves_id = $gloves_id;
        return $this -> save($player);
    }

    public function setBelt($id, $belt_id)
    {
        $player = $this -> get($id);
        $player -> belt_id = $belt_id;
        return $this -> save($player);
    }

    public function setBoots($id, $boots_id)
    {
        $player = $this -> get($id);
        $player -> boots_id = $boots_id;
        return $this -> save($player);
    }

    public function setNecklace($id, $necklace_id)
    {
        $player = $this -> get($id);
        $player -> necklace_id = $necklace_id;
        return $this -> save($player);
    }

    public function setRing($id, $ring_id)
    {
        $player = $this -> get($id);
        $player -> aring_id = $ring_id;
        return $this -> save($player);
    }

    public function setAccessory($id, $accessory_id)
    {
        $player = $this -> get($id);
        $player -> accessory_id = $accessory_id;
        return $this -> save($player);
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model
            -> with('character')
            -> with('user')
            -> with('weapon')
            -> with('shield')
            -> with('helmet')
            -> with('armor')
            -> with('gloves')
            -> with('belt')
            -> with('boots')
            -> with('necklace')
            -> with('ring')
            -> with('accessory')
            -> with('backpack')
            -> find($id);
    }

    public function getByUserID($user_id)
    {
        return $this -> model
            -> with('character')
            -> with('user')
            -> with('weapon')
            -> with('shield')
            -> with('helmet')
            -> with('armor')
            -> with('gloves')
            -> with('belt')
            -> with('boots')
            -> with('necklace')
            -> with('ring')
            -> with('accessory')
            -> with('backpack')
            -> where('user_id', $user_id)
            -> first();
    }

    private function save(&$player){
        return $player -> save() ? $this -> get($player->id) : null;
    }

    public function levelUp($id)
    {
        $player = $this -> model -> find($id);
        $player -> required_experience_points *= 1.19;
        $player -> experience_points = 0;
        return $this -> save($player);
    }


}