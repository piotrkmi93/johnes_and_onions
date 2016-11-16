<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IItemLookRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IMonsterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use App\Http\Repositories\IWordRepo;
use Carbon\Carbon;
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
            $wordRepo,
            $itemRepo,
            $itemLookRepo;

    public function __construct(IQuestRepo $questRepo,
                                IPlayerRepo $playerRepo,
                                ICharacterLookRepo $characterLookRepo,
                                ICharacterLookVariantRepo $characterLookVariantRepo,
                                IMonsterRepo $monsterRepo,
                                ICharacterRepo $characterRepo,
                                IWordRepo $wordRepo,
                                IItemRepo $itemRepo,
                                IItemLookRepo $itemLookRepo)
    {
        $this -> questRepo = $questRepo;
        $this -> playerRepo = $playerRepo;
        $this -> characterLookRepo = $characterLookRepo;
        $this -> characterLookVariantRepo = $characterLookVariantRepo;
        $this -> monsterRepo = $monsterRepo;
        $this -> characterRepo = $characterRepo;
        $this -> wordRepo = $wordRepo;
        $this -> itemRepo = $itemRepo;
        $this -> itemLookRepo = $itemLookRepo;
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

        else

        {

            foreach ($quests as $quest)
            {
                if($quest -> end_time)
                {
                    if(Carbon::now() >= $quest -> end_time)
                    {
                        dd('fight!');
                        // TODO: fight

                        // TODO: delete quests, monsters, characters and items after fight
                    }
                    else
                    {
                        return view('quest', compact('quest'));
                    }
                }
            }

        }

        return view('pub', compact('quests'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function start(Request $request)
    {
        $id = $request -> id;
        $quest = $this -> questRepo -> start($id);
        return redirect() -> route('player.pub');
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

        $item = null;
        if( rand(0,1) )
        {
            $type = $this -> randomItemType();
            $item = $this -> itemRepo -> create(
                $type,
                $this -> wordRepo -> generate(null),
                [
                    'armor_points' => rand(0, $player -> required_experience_points * 0.01),
                    'strength_points' => rand(0, $player -> required_experience_points * 0.01),
                    'dexterity_points' => rand(0, $player -> required_experience_points * 0.01),
                    'intelligence_points' => rand(0, $player -> required_experience_points * 0.01),
                    'durability_points' => rand(0, $player -> required_experience_points * 0.01),
                    'lucky_points' => rand(0, $player -> required_experience_points * 0.01),
                    'damage_min_points' => ($type == 'sword' || $type == 'wand') ? rand($player -> required_experience_points * 0.01, $player -> required_experience_points * 0.02) : 0,
                    'damage_max_points' => ($type == 'sword' || $type == 'wand') ? rand($player -> required_experience_points * 0.02, $player -> required_experience_points * 0.03) : 0,
                ],
                rand(
                    $player -> required_experience_points * 0.05,
                    $player -> required_experience_points * 0.1
                ),
                //$this -> itemLookRepo -> getRandom($type) // odkomentować jak będą obrazki
                1
            ) -> id;
        }

        $quest = $this -> questRepo -> create($player, $this -> wordRepo -> generate(null), $item, $monster->id);

        return $quest;
    }
}
