<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 16.11.2016
 * Time: 17:34
 */

namespace App\Http\Repositories;


interface IItemLookRepo
{
    public function get($id);
    public function getRandom($type);
}