<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 15:29
 */

namespace App\Http\Repositories\Eloquent;


use App\Character;
use App\Http\Repositories\IMonsterRepo;
use App\Monster;
use App\Player;

class MonsterRepo implements IMonsterRepo
{

    private $model;

    public function __construct(Monster $model)
    {
        $this -> model = $model;
    }

    public function create(Player $player, $character_id)
    {
        $monster = $this -> model -> newInstance();
        $monster -> character_id = $character_id;

        $statistics = $player -> statistics();

        $armor_points = rand($statistics['armor_points'] * 0.5, $statistics['armor_points'] * 1.05);
        $damage_min_points = rand($statistics['damage_min_points'] * 0.5, $statistics['damage_min_points'] * 1.05);
        $damage_max_points = rand($damage_min_points, $damage_min_points * 2);

        $monster -> attack_type = rand(0,1) ? 'melee' : 'magic';

        $monster -> armor_points = $armor_points;
        $monster -> damage_min_points = $damage_min_points;
        $monster -> damage_max_points = $damage_max_points;

        return $monster -> save() ? $monster : null;
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> find($id);
    }


}