<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\IItemLookRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IShopRepo;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    private $shopRepo,
            $playerRepo,
            $backpackRepo,
            $backpackItemRepo,
            $itemRepo,
            $itemLookRepo;

    public function __construct(IShopRepo $shopRepo,
                                IPlayerRepo $playerRepo,
                                IBackpackRepo $backpackRepo,
                                IBackpackItemRepo $backpackItemRepo,
                                IItemRepo $itemRepo,
                                IItemLookRepo $itemLookRepo)
    {
        $this -> shopRepo = $shopRepo;
        $this -> playerRepo = $playerRepo;
        $this -> backpackRepo = $backpackRepo;
        $this -> backpackItemRepo = $backpackItemRepo;
        $this -> itemRepo = $itemRepo;
        $this -> itemLookRepo = $itemLookRepo;
    }

    public function index($type)
    {

    }

    private function create()
    {

    }

    private function reset()
    {
        $player = $this -> playerRepo -> getByUserID($this -> user() -> id);
        $shops = $this -> shopRepo -> getByPlayerId($player -> id);

        foreach($shops as $shop)
        {
            $backpackItems = $this -> backpackItemRepo -> getByBackpackID($shop -> backpack_id);

            foreach ($backpackItems as $backpackItem)
            {
                $this -> itemRepo -> delete($backpackItem -> item_id);
                $this -> backpackItemRepo -> delete($backpackItem -> id);
            }

        }
    }
}
