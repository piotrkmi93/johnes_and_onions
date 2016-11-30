<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 19.10.2016
 * Time: 15:51
 */

namespace App\Http\Repositories;


interface IPlayerRepo
{

    public function create($user_id, $character_id, $backpack_id);
    public function updateDescription($id, $description);
    public function addExperience($id, $experience_points);
    public function addGloryPoints($id, $glory_points);
    public function addGold($id, $amount_of_gold);
    public function setWeapon($id, $weapon_id);
    public function setShield($id, $shield_id);
    public function setHelmet($id, $helmet_id);
    public function setArmor($id, $armor_id);
    public function setGloves($id, $gloves_id);
    public function setBelt($id, $belt_id);
    public function setBoots($id, $boots_id);
    public function setNecklace($id, $necklace_id);
    public function setRing($id, $ring_id);
    public function setAccessory($id, $accessory_id);
    public function delete($id);
    public function get($id);
    public function getByUserID($user_id);
    public function levelUp($id);
    public function ranking();
    public function nextInRanking($id);
    public function busy($id, $busy);

}