<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 23.10.2016
 * Time: 16:08
 */

namespace App\Http\Repositories;


interface ICharacterRepo
{

    public function create($character_look_id, $name);
    public function createMonster($character_look_id, $name, $player);
    public function update($id, $name);
    public function delete($id);
    public function get($id);
    public function increaseStrength($id);
    public function increaseDexterity($id);
    public function increaseIntelligence($id);
    public function increaseDurability($id);
    public function increaseLuck($id);
    public function levelUp($id);

}