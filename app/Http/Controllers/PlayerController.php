<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IWordRepo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    private $playerRepo,
            $characterRepo,
            $itemRepo,
            $characterLookRepo,
            $characterLookVariantRepo,
            $backpackRepo,
            $backpackItemRepo,
            $wordRepo;


    public function __construct(IPlayerRepo $playerRepo,
                                ICharacterRepo $characterRepo,
                                IItemRepo $itemRepo,
                                ICharacterLookRepo $characterLookRepo,
                                ICharacterLookVariantRepo $characterLookVariantRepo,
                                IBackpackRepo $backpackRepo,
                                IBackpackItemRepo $backpackItemRepo,
                                IWordRepo $wordRepo)
    {
        $this -> playerRepo = $playerRepo;
        $this -> characterRepo = $characterRepo;
        $this -> itemRepo = $itemRepo;
        $this -> characterLookRepo = $characterLookRepo;
        $this -> characterLookVariantRepo = $characterLookVariantRepo;
        $this -> backpackRepo = $backpackRepo;
        $this -> backpackItemRepo = $backpackItemRepo;
        $this -> wordRepo = $wordRepo;
    }

    public function index(){
        $player = $this -> playerRepo -> getByUserID($this->user()->id);
        return view('home');
    }

    public function getCharacterLookVariants(){
        return response() -> json(array(
            'variants' => $this -> characterLookVariantRepo -> getAll(),
        ));
    }

    public function create(Request $request)
    {
        $head_id = $request -> head_id;
        $eyebrow_id = $request -> eyebrow_id;
        $eyes_id = $request -> eyes_id;
        $hair_id = $request -> hair_id;
        $nose_id = $request -> nose_id;
        $mouth_id = $request -> mouth_id;

        $character_look = $this -> characterLookRepo -> create($hair_id, $eyebrow_id, $eyes_id, $mouth_id, $head_id, $nose_id);

        $backpack = $this -> backpackRepo -> create();

        $name = $request -> name;
        $user_id = $this -> user() -> id;

        $character = $this -> characterRepo -> create($character_look -> id, $name);

        $player = $this -> playerRepo -> create($user_id, $character->id, $backpack -> id);

        $itemName = $this -> wordRepo -> generate('item');
        $weapon = $this -> itemRepo -> create('sword', $itemName, array(
            'damage_min_points' => 10,
            'damage_max_points' => 20,
        ), 1, 1);

        $this -> setItem($weapon->id, 'weapon', $player->id);

        return back();
    }

    public function get(Request $request)
    {
        $id = $request -> id;
        $player = $this -> playerRepo -> get($id);
        return response() -> json([
            'player' => $player
        ]);
    }

    public function increment(Request $request)
    {
        // $user_id = $this -> user() -> id;
        $user_id = 1;
        $character_id = $this -> playerRepo -> getByUserID($user_id) -> character -> id;
        $attribute = $request -> attribute;

        switch($attribute){
            case 'strength': $this -> characterRepo -> increaseStrength($character_id); break;
            case 'dexterity': $this -> characterRepo -> increaseDexterity($character_id); break;
            case 'durability': $this -> characterRepo -> increaseDurability($character_id); break;
            case 'intelligence': $this -> characterRepo -> increaseIntelligence($character_id); break;
            case 'lucky': $this -> characterRepo -> increaseLucky($character_id); break;
        }

        return response() -> json([
            'player' => $this -> playerRepo -> getByUserID($user_id)
        ]);
    }

    public function set(Request $request)
    {
        //        $user_id = $this -> user() -> id;
        $user_id = 1;
        $player_id = $this -> playerRepo -> getByUserID($user_id) -> id;
        $attribute = $request -> attribute;
        $item_id = $request -> item_id;

        $this -> setItem($item_id, $attribute, $player_id);

        return response() -> json([
            'player' => $this -> playerRepo -> getByUserID($user_id)
        ]);

    }

    private function setItem($item_id, $attribute, $player_id){
        switch ($attribute){
            case 'weapon':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setWeapon($player_id, $item_id);
                break;

            case 'shield':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setShield($player_id, $item_id);
                break;

            case 'helmet':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setHelmet($player_id, $item_id);
                break;

            case 'armor':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setArmor($player_id, $item_id);
                break;

            case 'gloves':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setGloves($player_id, $item_id);
                break;

            case 'belt':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setBelt($player_id, $item_id);
                break;

            case 'boots':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setBoots($player_id, $item_id);
                break;

            case 'necklace':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setNecklace($player_id, $item_id);
                break;

            case 'ring':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setRing($player_id, $item_id);
                break;

            case 'accessory':
                if ( $this -> itemRepo -> is( $item_id, $attribute ) ) $this -> playerRepo -> setAccessory($player_id, $item_id);
                break;
        }
    }

    public function putIntoBackpack(Request $request)
    {

    }
}
