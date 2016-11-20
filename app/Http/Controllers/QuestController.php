<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IItemLookRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\IMonsterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use App\Http\Repositories\IWordRepo;
use App\Monster;
use App\Player;
use App\Quest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestController extends FightController
{
    private $questRepo,
            $playerRepo,
            $characterLookRepo,
            $characterLookVariantRepo,
            $monsterRepo,
            $characterRepo,
            $wordRepo,
            $itemRepo,
            $itemLookRepo,
            $backpackItemRepo;

    public function __construct(IQuestRepo $questRepo,
                                IPlayerRepo $playerRepo,
                                ICharacterLookRepo $characterLookRepo,
                                ICharacterLookVariantRepo $characterLookVariantRepo,
                                IMonsterRepo $monsterRepo,
                                ICharacterRepo $characterRepo,
                                IWordRepo $wordRepo,
                                IItemRepo $itemRepo,
                                IItemLookRepo $itemLookRepo,
                                IBackpackItemRepo $backpackItemRepo)
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
        $this -> backpackItemRepo = $backpackItemRepo;

        $this -> steps = null;
    }

    /**
     * @param Quest|null $quest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index($quest = null)
    {

        if( isset($quest) )
        {
            return $this -> start($quest);
        }

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
                if( isset($quest -> end_date ))
                {
                    if(Carbon::now() >= $quest -> end_date)
                    {
                        return $this -> fight($player, $quest);
                    }
                    else
                    {
                        $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $quest -> end_date) -> subSeconds($quest -> duration);

                        return view('quest', compact('quest', 'start_date'));
                    }
                }
            }

        }

        return view('pub', compact('quests'));
    }

    /**
     * @param $quest_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start($quest_id)
    {
        $this -> questRepo -> start($quest_id);
        return redirect() -> route('player.pub');
    }

    /**
     * @param Player $player
     * @return mixed
     */
    private function create(Player $player)
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

    /**
     * @param Player $player
     * @param Quest $quest
     * @return \Illuminate\Http\RedirectResponse
     */
    private function fight(Player $player, Quest $quest)
    {
        $winner = false;
        $steps = $this -> duel($player, $quest -> monster, $winner);

        if($winner)
        {
            $this -> reward($player, $quest);
        }

        return view('fight', [
            'player_1' => $player,
            'player_2' => $quest -> monster,
            'steps' => json_encode($steps),
            'quest' => true,
        ]);
    }

//    public function getFight()
//    {
//        return response() -> ;
//    }

    /**
     * @param Player $player
     * @param Quest $quest
     */
    private function reward(Player $player, Quest &$quest)
    {
        $this -> playerRepo -> addGold($player->id, $quest->amount_of_gold_reward);

        $character = $this -> characterRepo -> get($player -> character_id);
        $experience_from_quest = $quest->experience_points_reward;

        do
        {
            $experience_from_quest -= ($player -> required_experience_points - $player -> experience_points);

            $player = $this -> playerRepo -> levelUp($player -> id);
            $character = $this -> characterRepo -> levelUp($character -> id);
        }
        while( ($player -> required_experience_points - $player -> experience_points) < $experience_from_quest);

        $this -> playerRepo -> addExperience($player->id, $quest->experience_points_reward);

        if(isset($quest -> item_reward_id) && $this -> backpackItemRepo -> countByBackpackID($player -> backpack -> id) < $player -> backpack -> capacity){
            $this -> backpackItemRepo -> create($player -> backpack -> id, $quest -> item_reward_id);
            $quest = $this -> questRepo -> takeItem($quest -> id);
        }
    }

    /**
     *
     */
    public function delete(Request $request)
    {
        $player = $this -> playerRepo -> getByUserID($request -> user_id);
        $quests = $this -> questRepo -> getByPlayerId($player -> id);

        foreach($quests as $quest){
            $monster = $this -> monsterRepo -> get($quest -> monster_id);
            $monsterCharacter = $this -> characterRepo -> get($monster -> character_id);
            $monsterCharacterLook = $this -> characterLookRepo -> get($monsterCharacter -> character_look_id);

            $this -> characterLookRepo -> delete($monsterCharacterLook -> id);
            $this -> characterRepo -> delete($monsterCharacter -> id);
            $this -> monsterRepo -> delete($monster -> id);

            if($quest -> item_reward_id)
            {
                $this -> itemRepo -> delete($quest -> item_reward_id);
            }

            $this -> questRepo -> delete($quest -> id);
        }
    }

    /**
     * @return mixed
     */
    private function randomItemType()
    {
        $types = [
            'sword',
            'wand',
            'shield',
            'helmet',
            'armor',
            'gloves',
            'belt',
            'boots',
            'necklace',
            'ring',
            'accessory',
        ];

        return $types[rand(0, count($types)-1)];
    }
}
