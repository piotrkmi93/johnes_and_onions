<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\IItemLookRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IShopRepo;
use App\Http\Repositories\IWordRepo;
use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    private $shopRepo,
        $playerRepo,
        $backpackRepo,
        $backpackItemRepo,
        $itemRepo,
        $itemLookRepo,
        $wordRepo;

    /**
     * ShopController constructor.
     * @param IShopRepo $shopRepo
     * @param IPlayerRepo $playerRepo
     * @param IBackpackRepo $backpackRepo
     * @param IBackpackItemRepo $backpackItemRepo
     * @param IItemRepo $itemRepo
     * @param IItemLookRepo $itemLookRepo
     * @param IWordRepo $wordRepo
     */
    public function __construct(IShopRepo $shopRepo,
                                IPlayerRepo $playerRepo,
                                IBackpackRepo $backpackRepo,
                                IBackpackItemRepo $backpackItemRepo,
                                IItemRepo $itemRepo,
                                IItemLookRepo $itemLookRepo,
                                IWordRepo $wordRepo)
    {
        $this->shopRepo = $shopRepo;
        $this->playerRepo = $playerRepo;
        $this->backpackRepo = $backpackRepo;
        $this->backpackItemRepo = $backpackItemRepo;
        $this->itemRepo = $itemRepo;
        $this->itemLookRepo = $itemLookRepo;
        $this->wordRepo = $wordRepo;
    }

    /**
     * Wyświetla widok sklepu i przekazuje podstawowe informacje
     * @param null $shopType
     * @return View
     */
    public function index($shopType = null)
    {
        if (!isset($shopType)) {
            return back();
        }

        if (isset($shopType) && $shopType != 'armorer' && $shopType != 'blacksmith' && $shopType != 'jeweler') {
            return back();
        }

        $player = $this->player();
        $shop = $this->shopRepo->getByPlayerIdAndType($player->id, $shopType);


        if (!isset($shop)) {
            $this->create($shopType);
        }

        $shopItems = isset($shop) ? $this->backpackItemRepo->getByBackpackID($shop->backpack_id) : null;

        if (!isset($shop) && !isset($shopItems) || ((new Carbon($shop->last_update))->addHours(24) < (new Carbon()) || count($shopItems) == 0)) {
            $this->reset();
            return $this->index($shopType);
        }

        return view('shop', compact('shop', 'player'));
    }

    /**
     * Tworzy sklep
     * @param $shopType
     */
    private function create($shopType)
    {
        $this->shopRepo->create($shopType, $this->player()->id, $this->backpackRepo->create()->id);
    }

    /**
     * Resetuje zawartość sklepów
     */
    private function reset()
    {
        $player = $this->playerRepo->getByUserID($this->user()->id);
        $shops = $this->shopRepo->getByPlayerId($player->id);

        foreach ($shops as $shop) {
            $backpackItems = $this->backpackItemRepo->getByBackpackID($shop->backpack_id);

            foreach ($backpackItems as $backpackItem) {
                $this->itemRepo->delete($backpackItem->item_id);
                $this->backpackItemRepo->delete($backpackItem->id);
            }

            for ($i = 0; $i < 6; $i++) {
                $item = $this->generateItem($shop->type);
                $this->backpackItemRepo->create($shop->backpack_id, $item->id);
            }

            $this->shopRepo->reset($shop->id);
        }
    }

    /**
     * Generuje pojedynczy przedmiot
     * @param string $shopType
     * @param Player|null $player
     * @return mixed
     */
    private function generateItem($shopType, Player $player = null)
    {
        if(!isset($player)) $player = $this->player();
        $type = $this->randomItemType($shopType);

        return $this->itemRepo->create(
            $type,
            $this->wordRepo->generate(null),
            [
                'armor_points' => rand(0, $player->required_experience_points * 0.01),
                'strength_points' => rand(0, $player->required_experience_points * 0.01),
                'dexterity_points' => rand(0, $player->required_experience_points * 0.01),
                'intelligence_points' => rand(0, $player->required_experience_points * 0.01),
                'durability_points' => rand(0, $player->required_experience_points * 0.01),
                'lucky_points' => rand(0, $player->required_experience_points * 0.01),
                'damage_min_points' => ($type == 'sword' || $type == 'wand') ? rand($player->required_experience_points * 0.01, $player->required_experience_points * 0.02) : 0,
                'damage_max_points' => ($type == 'sword' || $type == 'wand') ? rand($player->required_experience_points * 0.02, $player->required_experience_points * 0.03) : 0,
            ],
            rand(
                $player->required_experience_points * 0.05,
                $player->required_experience_points * 0.1
            ),
            //$this -> itemLookRepo -> getRandom($type) // odkomentować jak będą obrazki
            1
        );
    }

    /**
     * Losuje rodzaj przedmiotu
     * @param $shopType
     * @return mixed|null
     */
    private function randomItemType($shopType)
    {
        $types = [];

        switch ($shopType) {
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

        return !empty($types) ? $types[rand(0, count($types) - 1)] : null;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function buy(Request $request)
    {
        $player = $this -> playerRepo -> get($request -> player_id);
        $backpackItems = $this -> backpackItemRepo -> getByBackpackID($player -> backpack_id);

        if(count($backpackItems) == 6)
        {
            return response() -> json(['success' => false]);
        }

        $shop = $this -> shopRepo -> get($request -> shop_id);
        $backpackItem = $this -> backpackItemRepo -> get($request -> backpack_item_id);

        $this -> backpackItemRepo -> create($player->backpack_id, $backpackItem->item_id);
        $this -> backpackItemRepo -> delete($backpackItem->id);

        $this -> playerRepo -> addGold($player->id, -$backpackItem->item->price);

        $newItem = $this -> backpackItemRepo -> create($shop->backpack_id, $this -> generateItem($shop->type, $player) -> id);

        return response() -> json(
            [
                'success' => true,
                'new_item' => $newItem,
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sell(Request $request)
    {
        $player = $this -> playerRepo -> get($request -> player_id);
        $backpackItem = $this -> backpackItemRepo -> get($request -> backpack_item_id);
        $price = $backpackItem -> item -> price / 2;
        $this -> itemRepo -> delete($backpackItem -> item_id);
        $this -> backpackItemRepo -> delete($backpackItem->id);

        $this -> playerRepo -> addGold($player -> id, $price);

        return response() -> json(
            [
                'success' => true,
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $items = $this -> backpackItemRepo -> getByBackpackID($this -> shopRepo -> get($request -> shop_id) -> backpack_id);
        return response() -> json(['items' => $items,]);
    }
}
