<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 21.11.2016
 * Time: 12:37
 */

namespace App\Http\Repositories;


interface IWorkRepo
{
    public function create($player_id, $duration, $end_date);
    public function getByPlayerId($player_id);
    public function delete($id);
}