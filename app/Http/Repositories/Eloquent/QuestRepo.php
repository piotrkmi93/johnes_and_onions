<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 31.10.2016
 * Time: 12:13
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IQuestRepo;
use App\Player;
use App\Quest;
use Carbon\Carbon;

class QuestRepo implements IQuestRepo
{
    private $model;

    public function __construct(Quest $model)
    {
        $this -> model = $model;
    }

    public function create(Player $player, $name, $item_id, $monster_id)
    {
        $quest = $this -> model -> newInstance();
        $quest -> player_id = $player -> id;
        $quest -> name = $name;
        $quest -> experience_points_reward = rand(
            $player -> required_experience_points * ((5/($player -> character -> level + 4)*50)+3)/100,
            $player -> required_experience_points * ((5/($player -> character -> level + 4)*50)+3)/30
        );
        $quest -> amount_of_gold_reward = rand(
            $player -> required_experience_points * 0.1,
            $player -> required_experience_points * 0.2
        );
        if(isset($item_id)){
            $quest -> item_id = $item_id;
        }

        $quest -> monster_id = $monster_id;

        $duration = rand(1,4); // 150, 300, 450, 600
        switch ($duration){
            case 1: $duration = 150; break;
            case 2: $duration = 300; break;
            case 3: $duration = 450; break;
            case 4: $duration = 600; break;
        }

        $quest -> duration = $duration;

        return $quest -> save() ? $quest : null;
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> find($id);
    }

    public function start($id)
    {
        $quest = $this -> get($id);
        $quest -> end_date = Carbon::now()->addSeconds($quest -> duration);
        return $quest -> save() ? $quest : null;
    }


}