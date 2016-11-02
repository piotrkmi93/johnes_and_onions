<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 15:07
 */

namespace App\Http\Repositories\Eloquent;


use App\Backpack;
use App\Http\Repositories\IBackpackRepo;

class BackpackRepo implements IBackpackRepo
{
    private $model;

    public function __construct(Backpack $model)
    {
        $this -> model = $model;
    }

    public function create()
    {
        $backpack = $this -> model -> newInstance();
        return $backpack -> save() ? $backpack : null;
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