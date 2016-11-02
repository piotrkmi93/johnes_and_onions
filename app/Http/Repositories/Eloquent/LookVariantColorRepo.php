<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 13:19
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\ILookVariantColorRepo;
use App\LookVariantColor;

class LookVariantColorRepo implements ILookVariantColorRepo
{
    private $model;

    public function __construct(LookVariantColor $model)
    {
        $this -> model = $model;
    }

    public function getAll()
    {
        return $this -> model -> all();
    }

}