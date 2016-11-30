<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IPlayerRepo;
use App\Player;
use Illuminate\Http\Request;

use App\Http\Requests;

class DuelController extends FightController
{
    private $playerRepo;

    public function __construct(IPlayerRepo $playerRepo)
    {
        $this->playerRepo = $playerRepo;
    }

    public function index($defender = null)
    {
        if($this -> is_busy() && $this -> is_busy() == 'q')
        {
            return redirect() -> route('player.pub');
        }

        if($this -> is_busy() && $this -> is_busy() == 'w')
        {
            return redirect() -> route('player.work');
        }

        $attacker = $this -> playerRepo -> getByUserID($this -> user() -> id);

        if(isset($defender)) {
            return $this -> fight($attacker, $defender);
        }

        $defender = $this -> playerRepo -> nextInRanking($attacker -> id);

        return view('fight', [
            'player_1' => $attacker,
            'player_2' => $defender,
            'duel_preview' => true,
        ]);
    }

    public function fight(Player $attacker, $defender)
    {
        $defender = $this -> playerRepo -> getByUserID($defender);

        $winner = false;
        $steps = $this -> duel($attacker, $defender, $winner);

        $this -> reward($attacker, $defender, $winner);

        return view('fight', [
            'player_1' => $attacker,
            'player_2' => $defender,
            'duel' => true,
            'steps' => json_encode($steps),
        ]);
    }

    public function reward(Player &$attacker, Player &$defender, $winner)
    {
        if($winner)
        {
            $amount_of_gold = $defender -> amount_of_gold * 0.1;
            $this -> playerRepo -> addGold($defender->id, -$amount_of_gold);
            $this -> playerRepo -> addGold($attacker->id, $amount_of_gold);
            $this -> playerRepo -> addGloryPoints($attacker->id, 10);
        }
        else
        {
            if($attacker -> glory_points < 15)
            {
                $this -> playerRepo -> addGloryPoints($attacker->id, -(15 - $attacker -> glory_points));
            }
            else
            {
                $this -> playerRepo -> addGloryPoints($attacker->id, -15);
            }
        }
    }

    public function ranking()
    {
        //temporary
        $ranking = $this -> playerRepo -> ranking();
        return view('ranking', compact('ranking'));
        //return view('ranking');
    }

    public function getRanking()
    {
        return response() -> json(['ranking' => $this -> playerRepo -> ranking()]);
    }
}
