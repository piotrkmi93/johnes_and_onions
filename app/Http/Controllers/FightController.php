<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FightController extends Controller
{
    protected function attack($attacker, $defender, &$defender_hp, array &$steps)
    {
        $attack_value = 0;
        $is_dodge = false;
        $is_critical = false;

        if(rand(0,100) < $defender->statistics()['dexterity_points'] / ($defender->character->level + 1))
        {
            $is_dodge = true;
        }
        else
        {
            $attack_value = rand($attacker->statistics()['damage_min_points'], $attacker->statistics()['damage_max_points']);

            if($attacker->statistics()['attack_type'] == 'melee')
            {
                $attack_value -= $defender->statistics()['armor_points'];
            }
            else
            {
                $attack_value -= $defender->statistics()['intelligence_points'] / 2;
            }

            if($attack_value < 0) $attack_value = 1;

            if(rand(0,100) < $attacker->statistics()['luck_points'] * 5 / ($attacker->character->level * 2))
            {
                $attack_value *= 2;
                $is_critical = true;
            }
    }

        $defender_hp -= $attack_value;

        $steps[] = [
            'attacker' => $attacker -> character -> name,
            'defender' => $defender -> character -> name,
            'attack_value' => $attack_value,
            'is_dodge' => $is_dodge,
            'is_critical' => $is_critical,
        ];
    }

    protected function duel($player_1, $player_2, &$winner = null)
    {
        $player_1_hp = $player_1 -> statistics()['durability_points'] * 5 * ($player_1->character->level + 1);
        $player_2_hp = $player_2 -> statistics()['durability_points'] * 5 * ($player_2->character->level + 1);

        $step = 0;
        $steps = [];

        while($player_1_hp > 0 && $player_2_hp > 0 )
        {
            if($step % 2)
            {
                $this -> attack($player_2, $player_1, $player_1_hp, $steps);
            }
            else
            {
                $this -> attack($player_1, $player_2, $player_2_hp, $steps);
            }
            $step++;
        }

        if(isset($winner) && $player_1_hp > 0) $winner = true;

        return $steps;
    }
}
