<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 15:06
 */

namespace App\Http\Repositories;


interface IBackpackRepo
{
    public function create();
    public function delete($id);
    public function get($id);

}