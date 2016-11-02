<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 13:29
 */

namespace App\Http\Repositories;


interface ICharacterLookVariantRepo
{

    public function get($id);
    public function getAll();
    public function getRandom($type);

}