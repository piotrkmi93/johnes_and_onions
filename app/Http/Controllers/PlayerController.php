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
        return view('home');
    }

    public function character(){
        $player = $this -> playerRepo -> getByUserID($this->user()->id);
        return view('character', compact('player'));
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
        $body_id = $request -> body_id;

        $character_look = $this -> characterLookRepo -> create($body_id, $hair_id, $eyebrow_id, $eyes_id, $mouth_id, $head_id, $nose_id);

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
        $user_id = $request -> user_id;
        $player = $this -> playerRepo -> getByUserID($user_id);
        $character = $player -> character;
        $type = $request -> attribute;

        switch($type){
            case 'strength': {
                $price = $this->calculatePrice($character->strength_points);
                if($player -> amount_of_gold >= $price){
                    $this -> playerRepo -> addGold($player->id, -$price);
                    $this -> characterRepo -> increaseStrength($character->id);
                }
            } break;
            case 'dexterity': {
                $price = $this->calculatePrice($character->dexterity_points);
                if($player -> amount_of_gold >= $price){
                    $this -> playerRepo -> addGold($player->id, -$price);
                    $this -> characterRepo -> increaseDexterity($character->id);
                }
            } break;
            case 'durability': {
                $price = $this->calculatePrice($character->durability_points);
                if($player -> amount_of_gold >= $price){
                    $this -> playerRepo -> addGold($player->id, -$price);
                    $this -> characterRepo -> increaseDurability($character->id);
                }
            } break;
            case 'intelligence': {
                $price = $this->calculatePrice($character->intelligence_points);
                if($player -> amount_of_gold >= $price){
                    $this -> playerRepo -> addGold($player->id, -$price);
                    $this -> characterRepo -> increaseIntelligence($character->id);
                }
            } break;
            case 'luck': {
                $price = $this->calculatePrice($character->luck_points);
                if($player -> amount_of_gold >= $price){
                    $this -> playerRepo -> addGold($player->id, -$price);
                    $this -> characterRepo -> increaseLuck($character->id);
                }
            } break;
        }

        return response() -> json([
            'player' => $this -> playerRepo -> getByUserID($user_id)
        ]);
    }

    private function calculatePrice($level){
        $price = 10;
        $level -= 10;
        while($level > 0){
            $price *= 1.11;
            $level--;
        }
        return $price;
    }

    public function set(Request $request)
    {
        $user_id = $request -> user_id;
        $player_id = $this -> playerRepo -> getByUserID($user_id) -> id;
        $backpack_item_id = $request -> backpack_item_id;

        $item = $this -> itemRepo -> get( $this -> backpackItemRepo -> get($backpack_item_id) -> item_id );

        if($this -> setItem($item -> id, $item -> type, $player_id)){
            $this -> backpackItemRepo -> delete($backpack_item_id);
        }

        return response() -> json([
            'player' => $this -> playerRepo -> getByUserID($user_id)
        ]);
    }

    private function setItem($item_id, $type, $player_id){
        switch ($type){
            case 'sword':
            case 'wand':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setWeapon($player_id, $item_id);
                    return true;
                }
                break;

            case 'shield':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setShield($player_id, $item_id);
                    return true;
                }
                break;

            case 'helmet':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setHelmet($player_id, $item_id);
                    return true;
                }
                break;

            case 'armor':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setArmor($player_id, $item_id);
                    return true;
                }
                break;

            case 'gloves':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setGloves($player_id, $item_id);
                    return true;
                }
                break;

            case 'belt':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setBelt($player_id, $item_id);
                    return true;
                }
                break;

            case 'boots':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setBoots($player_id, $item_id);
                    return true;
                }
                break;

            case 'necklace':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setNecklace($player_id, $item_id);
                    return true;
                }
                break;

            case 'ring':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setRing($player_id, $item_id);
                    return true;
                }
                break;

            case 'accessory':
                if ( $this -> itemRepo -> is( $item_id, $type ) ) {
                    $this -> playerRepo -> setAccessory($player_id, $item_id);
                    return true;
                }
                break;
        }

        return false;
    }

    public function put(Request $request)
    {
        $user_id = $request -> user_id;
        $item = $this -> itemRepo -> get($request -> item_id);
        $player = $this -> playerRepo -> getByUserID($user_id);
        $backpack_id = $player -> backpack_id;

        if($this->putItem($item->type, $player->id)){
            $this -> backpackItemRepo -> create($backpack_id, $item->id);
        }

        return response() -> json([
            'player' => $this -> playerRepo -> getByUserID($user_id)
        ]);
    }

    private function putItem($type, $player_id)
    {
        switch($type){
            case 'sword':
                $this -> playerRepo -> setWeapon($player_id, null);
                return true;

            case 'wand':
                $this -> playerRepo -> setWeapon($player_id, null);
                return true;

            case 'shield':
                $this -> playerRepo -> setShield($player_id, null);
                return true;

            case 'helmet':
                $this -> playerRepo -> setHelmet($player_id, null);
                return true;

            case 'armor':
                $this -> playerRepo -> setArmor($player_id, null);
                return true;

            case 'gloves':
                $this -> playerRepo -> setGloves($player_id, null);
                return true;

            case 'belt':
                $this -> playerRepo -> setBelt($player_id, null);
                return true;

            case 'boots':
                $this -> playerRepo -> setBoots($player_id, null);
                return true;

            case 'necklace':
                $this -> playerRepo -> setNecklace($player_id, null);
                return true;

            case 'ring':
                $this -> playerRepo -> setRing($player_id, null);
                return true;

            case 'accessory':
                $this -> playerRepo -> setAccessory($player_id, null);
                return true;
        }

        return false;
    }
}
