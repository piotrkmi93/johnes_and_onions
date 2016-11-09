<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 02.11.2016
 * Time: 15:58
 */

namespace App\Http\Repositories;


interface IWordRepo
{
    public function generate($type);
}