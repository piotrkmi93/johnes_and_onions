<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 21.11.2016
 * Time: 12:39
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IWorkRepo;
use App\Work;

class WorkRepo implements IWorkRepo
{
    /**
     * @var Work
     */
    private $model;

    /**
     * WorkRepo constructor.
     * @param Work $model
     */
    public function __construct(Work $model)
    {
        $this -> model = $model;
    }

    /**
     * @param $player_id
     * @param $duration
     * @param $end_time
     * @return null|static
     */
    public function create($player_id, $duration, $end_date)
    {
        $work = $this -> model -> newInstance();
        $work -> player_id = $player_id;
        $work -> duration = $duration;
        $work -> end_date = $end_date;
        return $work -> save() ? $work : null;
    }

    public function getByPlayerId($player_id)
    {
        return $this -> model -> where('player_id', $player_id) -> first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this -> model -> find($id) -> delete();
    }
}