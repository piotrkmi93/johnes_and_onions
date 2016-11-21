<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 21.11.2016
 * Time: 13:33
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IShopRepo;
use App\Shop;
use Carbon\Carbon;

class ShopRepo implements IShopRepo
{
    /**
     * @var Shop
     */
    private $model;

    /**
     * ShopRepo constructor.
     * @param Shop $model
     */
    public function __construct(Shop $model)
    {
        $this -> model = $model;
    }

    /**
     * @param $type
     * @param $player_id
     * @param $backpack_id
     * @return null|static
     */
    public function create($type, $player_id, $backpack_id)
    {
        $shop = $this -> model -> newInstance();
        $shop -> type = $type;
        $shop -> player_id = $player_id;
        $shop -> backpack_id = $backpack_id;
        $shop -> last_update = Carbon::now();
        return $shop -> save() ? $shop : null;
    }

    /**
     * @param $player_id
     * @return mixed
     */
    public function getByPlayerId($player_id)
    {
        return $this -> model -> where('player_id', $player_id) -> get();
    }

    /**
     * @param $player_id
     * @param $type
     * @return mixed
     */
    public function getByPlayerIdAndType($player_id, $type)
    {
        return $this -> model -> where('player_id', $player_id) -> where('type', $type) -> first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this -> model -> find($id) -> delete();
    }

    /**
     * @param $id
     * @return null
     */
    public function reset($id)
    {
        $shop = $this -> model -> find($id);
        $shop -> last_update = Carbon::now();
        return $shop -> save() ? $shop : null;
    }
}