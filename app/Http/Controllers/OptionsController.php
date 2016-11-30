<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use App\Http\Repositories\IUserRepo;
use Illuminate\Http\Request;

use App\Http\Requests;


class OptionsController extends Controller
{
    private $userRepo,
            $characterRepo,
            $playerRepo,
            $characterLookRepo,
            $backpackRepo,
            $backpackItemRepo,
            $itemRepo,
            $questRepo;

    public function __construct(IUserRepo $userRepo,
                                ICharacterRepo $characterRepo,
                                IPlayerRepo $playerRepo,
                                ICharacterLookRepo $characterLookRepo,
                                IBackpackRepo $backpackRepo,
                                IBackpackItemRepo $backpackItemRepo,
                                IItemRepo $itemRepo,
                                IQuestRepo $questRepo)
    {
        $this -> userRepo = $userRepo;
        $this -> characterRepo = $characterRepo;
        $this -> playerRepo = $playerRepo;
        $this -> characterLookRepo = $characterLookRepo;
        $this -> backpackRepo = $backpackRepo;
        $this -> backpackItemRepo = $backpackItemRepo;
        $this -> itemRepo = $itemRepo;
        $this -> questRepo = $questRepo;
    }

    public function index()
    {
        return view('options');
    }

    public function password(Request $request)
    {
        $user = $this -> user();

        $current_password = $request -> current_password;
        $password = $request -> password;
        $confirm_password = $request -> confirm_password;

        if( strlen($current_password) < 6 || strlen($password) < 6 || strlen($confirm_password) < 6 )
        {
            return view('options', ['p_success' => false, 'p_info' => 'Password is too short (at least 6 characters)']);
        }

        if( !$this -> userRepo -> passwordCorrect($user -> id, $current_password) )
        {
            return view('options', ['p_success' => false, 'p_info' => 'Password incorrect']);
        }

        if ( $password !== $confirm_password )
        {
            return view('options', ['p_success' => false, 'p_info' => 'Passwords do not match']);
        }

        if ( $password === $current_password )
        {
            return view('options', ['p_success' => false, 'p_info' => 'New password must be different from the old']);
        }

        $this -> userRepo -> update( $user -> id, bcrypt($password) );

        return view('options', ['p_success' => true, 'p_info' => 'Password updated']);
    }

    public function name(Request $request)
    {
        $name = $request -> name;

        if( strlen($name) < 6 )
        {
            return view('options', ['n_success' => false, 'n_info' => 'Name is too short (at least 6 characters)']);
        }

        $this -> characterRepo -> update(
            $this -> playerRepo -> getByUserID( $this -> user() -> id ) -> character_id,
            $name
        );

        return view('options', ['n_success' => true, 'n_info' => 'Name updated']);
    }

    public function description(Request $request)
    {
        $description = $request -> description;

        $this -> playerRepo -> updateDescription( $this -> playerRepo -> getByUserID( $this -> user() -> id ) -> id, $description );

        return view('options', ['d_success' => true, 'd_info' => 'Description updated']);
    }

    public function delete()
    {
        $user = $this -> user();

        $player = $this -> playerRepo -> getByUserID($user -> id);
        $character = $this -> characterRepo -> get($player -> character_id);
        $characterLook = $this -> characterLookRepo -> get($character -> character_look_id);
        $backpack = $this -> backpackRepo -> get($player -> backpack_id);
        $backpackItems = $this -> backpackItemRepo -> getByBackpackID($backpack -> id);
        $quests = $this -> questRepo -> getByPlayerId($player -> id);

        $items = [];

        foreach ($backpackItems as $backpackItem){
            $items[] = $backpackItem -> item_id;
            $this -> backpackItemRepo -> delete($backpackItem -> id);
        }

        $this -> backpackRepo -> delete($backpack -> id);

        foreach ($quests as $quest){
            if(isset($quest -> item_reward_id)){
                $items[] = $quest -> item_reward_id;
            }
            $this -> questRepo -> delete($quest -> id);
        }

        if (isset($player -> weapon_id)) $items[] = $player -> weapon_id;
        if (isset($player -> shield_id)) $items[] = $player -> shield_id;
        if (isset($player -> helmet_id)) $items[] = $player -> helmet_id;
        if (isset($player -> armor_id)) $items[] = $player -> armor_id;
        if (isset($player -> gloves_id)) $items[] = $player -> gloves_id;
        if (isset($player -> belt_id)) $items[] = $player -> belt_id;
        if (isset($player -> boots_id)) $items[] = $player -> boots_id;
        if (isset($player -> necklace_id)) $items[] = $player -> necklace_id;
        if (isset($player -> ring_id)) $items[] = $player -> ring_id;
        if (isset($player -> accessory_id)) $items[] = $player -> accessory_id;

        foreach ($items as $item){
            $this -> itemRepo -> delete($item);
        }

        $this -> characterLookRepo -> delete($characterLook -> id);
        $this -> characterRepo -> delete($character -> id);
        $this -> playerRepo -> delete($player -> id);
        $this -> userRepo -> delete($user -> id);

        return redirect('/register');
    }
}
