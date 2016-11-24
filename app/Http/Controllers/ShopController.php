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
        $this -> shopRepo -> create('armorer', $this->playerRepo->getByUserID($this -> user() -> id), $this -> backpackRepo -> create() -> id);
        $this -> shopRepo -> create('blacksmith', $this->playerRepo->getByUserID($this -> user() -> id), $this -> backpackRepo -> create() -> id);
        $this -> shopRepo -> create('jeweler', $this->playerRepo->getByUserID($this -> user() -> id), $this -> backpackRepo -> create() -> id);
    }

    private function reset()
    {
        $player = $this -> playerRepo -> getByUserID($this -> user() -> id);
        $shops = $this -> shopRepo -> getByPlayerId($player -> id);

        if(!$shops)
            $this -> create();

        foreach($shops as $shop)
        {
            $backpackItems = $this -> backpackItemRepo -> getByBackpackID($shop -> backpack_id);

            foreach ($backpackItems as $backpackItem)
            {
                $this -> itemRepo -> delete($backpackItem -> item_id);
                $this -> backpackItemRepo -> delete($backpackItem -> id);
            }

            // TODO: new items
            for($i=0; $i<6; $i++)
            {
                $item = $this -> generateItem($shop -> type);
            }
        }

        for($i=0; $i<6; ++$i)
        {

        }
    }

    private function generateItem($shopType)
    {

    }

    private function randomItemType($shopType)
    {
        $types = [];

        switch($shopType)
        {
            case 'armorer':
                $types = [
                    'sword',
                    'wand',
                    'shield',
                ];
                break;

            case 'blacksmith':
                $types = [
                    'helmet',
                    'armor',
                    'gloves',
                    'belt',
                    'boots',
                ];
                break;

            case 'jeweler':
                $types = [
                    'necklace',
                    'ring',
                    'accessory',
                ];
                break;
        }

        return !empty($types) ? $types[rand(0, count($types)-1)] : null;
    }
}
