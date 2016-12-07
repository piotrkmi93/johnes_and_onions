<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 23.10.2016
 * Time: 20:22
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IItemRepo;
use App\Item;

class ItemRepo implements  IItemRepo
{
    private $model;

    public function __construct(Item $model)
    {
        $this -> model = $model;
    }

    public function create($type, $name, array $attributes, $price, $item_look_id)
    {
        $item = $this -> model -> newInstance();
        $item -> type = $type;
        $item -> name = $name;
        $item -> price = $price;
        $item -> item_look_id = $item_look_id;

        if ( isset( $attributes['armor_points'] ) ) $item -> armor_points = $attributes['armor_points'];
        if ( isset( $attributes['strength_points'] ) ) $item -> strength_points = $attributes['strength_points'];
        if ( isset( $attributes['dexterity_points'] ) ) $item -> dexterity_points = $attributes['dexterity_points'];
        if ( isset( $attributes['intelligence_points'] ) ) $item -> intelligence_points = $attributes['intelligence_points'];
        if ( isset( $attributes['durability_points'] ) ) $item -> durability_points = $attributes['durability_points'];
        if ( isset( $attributes['luck_points'] ) ) $item -> luck_points = $attributes['luck_points'];
        if ( isset( $attributes['damage_min_points'] ) ) $item -> damage_min_points = $attributes['damage_min_points'];
        if ( isset( $attributes['damage_max_points'] ) ) $item -> damage_max_points = $attributes['damage_max_points'];

        return $item -> save() ? $item : null;
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> with('itemLook') -> find($id);
    }

    public function is($id, $type)
    {
        $item_type = $this -> get($id) -> type;
        if ($type == 'weapon') return $item_type == 'sword' || $item_type == 'wand';
        return $item_type == $type;
    }


}