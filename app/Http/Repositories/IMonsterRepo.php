<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 28.10.2016
 * Time: 12:03
 */

namespace App\Http\Repositories;


use App\Character;
use App\Player;

interface IMonsterRepo
{
    public function create(Player $player, $character_id);
    public function delete($id);
    public function get($id);
}