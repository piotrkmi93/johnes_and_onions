<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 23.10.2016
 * Time: 18:59
 */

namespace App\Http\Repositories\Eloquent;


use App\Character;
use App\Http\Repositories\ICharacterRepo;

class CharacterRepo implements ICharacterRepo
{

    private $model;

    public function __construct(Character $model)
    {
        $this -> model = $model;
    }

    public function create($character_look_id, $name)
    {
        $character = $this -> model -> newInstance();
        $character -> character_look_id = $character_look_id;
        $character -> name = $name;
        return $this -> save($character);
    }

    public function createMonster($character_look_id, $name, $playerCharacter)
    {
        $monsterCharacter = $this -> model -> newInstance();
        $monsterCharacter -> character_look_id = $character_look_id;
        $monsterCharacter -> name = $name;

        $monsterCharacter -> level = $playerCharacter -> level;
        $monsterCharacter -> strength_points = rand($playerCharacter -> strength_points * 0.5, $playerCharacter -> strength_points * 1.05);
        $monsterCharacter -> dexterity_points = rand($playerCharacter -> dexterity_points * 0.5, $playerCharacter -> dexterity_points * 1.05);
        $monsterCharacter -> intelligence_points = rand($playerCharacter -> intelligence_points * 0.5, $playerCharacter -> intelligence_points * 1.05);
        $monsterCharacter -> durability_points = rand($playerCharacter -> durability_points * 0.5, $playerCharacter -> durability_points * 1.05);
        $monsterCharacter -> luck_points = rand($playerCharacter -> lucky_points * 0.5, $playerCharacter -> luck_points * 1.05);

        return $this -> save($monsterCharacter);
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> with('characterLook') -> find($id);
    }

    public function increaseStrength($id)
    {
        $character = $this -> get($id);
        $character -> strength_points += 1;
        return $this -> save($character);
    }

    public function increaseDexterity($id)
    {
        $character = $this -> get($id);
        $character -> dexterity_points += 1;
        return $this -> save($character);
    }

    public function increaseIntelligence($id)
    {
        $character = $this -> get($id);
        $character -> intelligence_points += 1;
        return $this -> save($character);
    }

    public function increaseDurability($id)
    {
        $character = $this -> get($id);
        $character -> durability_points += 1;
        return $this -> save($character);
    }

    public function increaseLucky($id)
    {
        $character = $this -> get($id);
        $character -> lucky_points += 1;
        return $this -> save($character);
    }

    private function save(&$character)
    {
        return $character -> save() ? $character : null;
    }
}