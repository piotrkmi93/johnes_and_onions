<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 31.10.2016
 * Time: 12:10
 */

namespace App\Http\Repositories;


use App\Player;

interface IQuestRepo
{
    public function create(Player $player, $name, $item_id, $monster_id);
    public function delete($id);
    public function get($id);
    public function start($id);
    public function getByPlayerId($player_id);
    public function takeItem($id);
}