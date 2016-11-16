<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 16.11.2016
 * Time: 17:35
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IItemLookRepo;
use App\ItemLook;
use Illuminate\Support\Facades\DB;

class ItemLookRepo implements IItemLookRepo
{
    /**
     * @var ItemLook
     */
    private $model;

    /**
     * ItemLookRepo constructor.
     * @param ItemLook $model
     */
    public function __construct(ItemLook $model)
    {
        $this -> model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this -> model -> find($id);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getRandom($type)
    {
        return $this -> model -> where('type', 'like', $type) -> orderBy(DB::raw('RADN()')) -> first();
    }


}