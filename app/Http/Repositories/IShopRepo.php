<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 21.11.2016
 * Time: 13:32
 */

namespace App\Http\Repositories;


interface IShopRepo
{
    public function create($type, $player_id, $backpack_id);
    public function getByPlayerId($player_id);
    public function getByPlayerIdAndType($player_id, $type);
    public function delete($id);
    public function reset($id);
}