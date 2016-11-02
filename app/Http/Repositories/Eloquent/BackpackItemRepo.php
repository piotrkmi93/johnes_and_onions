<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 15:12
 */

namespace App\Http\Repositories\Eloquent;


use App\BackpackItem;
use App\Http\Repositories\IBackpackItemRepo;

class BackpackItemRepo implements IBackpackItemRepo
{
    private $model;

    public function __construct(BackpackItem $model)
    {
        $this -> model = $model;
    }

    public function create($backpack_id, $item_id)
    {
        $backpackItem = $this -> model -> newInstance();
        $backpackItem -> backpack_id = $backpack_id;
        $backpackItem -> item_id = $item_id;
        return $backpackItem -> save() ? $backpackItem : null;
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> find($id);
    }

    public function getByBackpackID($backpack_id)
    {
        return $this -> model -> where('backpack_id', $backpack_id) -> get();
    }


}