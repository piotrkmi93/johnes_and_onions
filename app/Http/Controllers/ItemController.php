<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IItemRepo;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    private $itemRepo;

    public function __construct(IItemRepo $itemRepo){
        $this -> itemRepo = $itemRepo;
    }

    public function create(){

    }
}
