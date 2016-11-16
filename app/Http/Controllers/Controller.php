<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function user()
    {
        return Auth::user();
    }

    protected function randomItemType()
    {
        $types = [
            'sword',
            'wand',
            'shield',
            'helmet',
            'armor',
            'gloves',
            'belt',
            'boots',
            'necklace',
            'ring',
            'accessory',
        ];

        return $types[rand(0, count($types)-1)];
    }
}
