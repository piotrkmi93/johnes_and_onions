<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 15:11
 */

namespace App\Http\Repositories;


interface IBackpackItemRepo
{
    public function create($backpack_id, $item_id);
    public function delete($id);
    public function get($id);
    public function getByBackpackID($backpack_id);
    public function countByBackpackID($backpack_id);
}