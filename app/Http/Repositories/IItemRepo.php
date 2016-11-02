<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 23.10.2016
 * Time: 20:20
 */

namespace App\Http\Repositories;


interface IItemRepo
{
    public function create($type, $name, array $attributes, $price, $item_look_id);
    public function delete($id);
    public function get($id);
    public function is($id, $type);
}