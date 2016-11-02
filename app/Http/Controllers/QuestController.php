<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IMonsterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestController extends Controller
{
    private $questRepo,
            $playerRepo,
            $characterLookRepo,
            $characterLookVariantRepo,
            $monsterRepo,
            $characterRepo;

    public function __construct(IQuestRepo $questRepo,
                                IPlayerRepo $playerRepo,
                                ICharacterLookRepo $characterLookRepo,
                                ICharacterLookVariantRepo $characterLookVariantRepo,
                                IMonsterRepo $monsterRepo,
                                ICharacterRepo $characterRepo)
    {
        $this -> questRepo = $questRepo;
        $this -> playerRepo = $playerRepo;
        $this -> characterLookRepo = $characterLookRepo;
        $this -> characterLookVariantRepo = $characterLookVariantRepo;
        $this -> monsterRepo = $monsterRepo;
        $this -> characterRepo = $characterRepo;
    }

    public function create(Request $request)
    {
        $player = $this -> playerRepo -> getByUserID($request->id);
//        $player = $this -> playerRepo -> getByUserID($this -> user() -> id);
        $characterLook = $this -> characterLookRepo -> create(
            $this -> characterLookVariantRepo -> getRandom('hair') -> id,
            $this -> characterLookVariantRepo -> getRandom('eyebrow') -> id,
            $this -> characterLookVariantRepo -> getRandom('eyes') -> id,
            $this -> characterLookVariantRepo -> getRandom('mouth') -> id,
            $this -> characterLookVariantRepo -> getRandom('head') -> id,
            $this -> characterLookVariantRepo -> getRandom('nose') -> id
        );
        $character = $this -> characterRepo -> createMonster($characterLook->id, "Test Monster", $player->character);
        $monster = $this -> monsterRepo -> create($player, $character->id);
        $quest = $this -> questRepo -> create($player, "Test Quest", null, $monster->id);

        return $quest;
    }

    public function start(Request $request)
    {
        $id = $request -> id;
        $quest = $this -> questRepo -> start($id);
        return response() -> json([
            'quest' => $quest,
        ]);
    }
}
