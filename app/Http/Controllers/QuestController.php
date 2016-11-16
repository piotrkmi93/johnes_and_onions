<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IMonsterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use App\Http\Repositories\IWordRepo;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestController extends Controller
{
    private $questRepo,
            $playerRepo,
            $characterLookRepo,
            $characterLookVariantRepo,
            $monsterRepo,
            $characterRepo,
            $wordRepo;

    public function __construct(IQuestRepo $questRepo,
                                IPlayerRepo $playerRepo,
                                ICharacterLookRepo $characterLookRepo,
                                ICharacterLookVariantRepo $characterLookVariantRepo,
                                IMonsterRepo $monsterRepo,
                                ICharacterRepo $characterRepo,
                                IWordRepo $wordRepo)
    {
        $this -> questRepo = $questRepo;
        $this -> playerRepo = $playerRepo;
        $this -> characterLookRepo = $characterLookRepo;
        $this -> characterLookVariantRepo = $characterLookVariantRepo;
        $this -> monsterRepo = $monsterRepo;
        $this -> characterRepo = $characterRepo;
        $this -> wordRepo = $wordRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $player = $this -> playerRepo -> getByUserID($this -> user() -> id);

        $quests = $this -> questRepo -> getByPlayerId($player -> id);

        if( !count($quests) )
        {
            $quests = [];
            for($i=0; $i<3; $i++)
                $quests[] = $this -> create($player);
        }

        return view('pub', compact('quests'));
    }

    /**
     * @param $player
     * @return mixed
     */
    private function create($player)
    {
        $characterLook = $this -> characterLookRepo -> create(
            $this -> characterLookVariantRepo -> getRandom('body') -> id,
            $this -> characterLookVariantRepo -> getRandom('hair') -> id,
            $this -> characterLookVariantRepo -> getRandom('eyebrow') -> id,
            $this -> characterLookVariantRepo -> getRandom('eyes') -> id,
            $this -> characterLookVariantRepo -> getRandom('mouth') -> id,
            $this -> characterLookVariantRepo -> getRandom('head') -> id,
            $this -> characterLookVariantRepo -> getRandom('nose') -> id
        );
        $character = $this -> characterRepo -> createMonster($characterLook->id, $this -> wordRepo -> generate('monster'), $player->character);
        $monster = $this -> monsterRepo -> create($player, $character->id);
        $quest = $this -> questRepo -> create($player, $this -> wordRepo -> generate(null), null, $monster->id);

        return $quest;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function start(Request $request)
    {
        $id = $request -> id;
        $quest = $this -> questRepo -> start($id);
        return response() -> json([
            'quest' => $quest,
        ]);
    }
}
