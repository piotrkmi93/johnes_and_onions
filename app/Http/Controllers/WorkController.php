<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IWorkRepo;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class WorkController extends Controller
{
    private $workRepo,
            $playerRepo;

    public function __construct(IWorkRepo $workRepo, IPlayerRepo $playerRepo)
    {
        $this -> workRepo = $workRepo;
        $this -> playerRepo = $playerRepo;
    }

    public function index($gold = null)
    {
        if($this -> is_busy() && $this -> is_busy() == 'q')
        {
            return redirect() -> route('player.pub');
        }

        if($this -> is_busy() && $this -> is_busy() == 'w')
        {
            $work = $this -> workRepo -> getByPlayerId($this -> playerRepo -> getByUserID($this -> user() ->id) -> id);

            if(Carbon::now() >= $work -> end_date)
            {
                return $this -> reward($work);
            }

            return $this -> work($work);
        }

        $player = $this -> playerRepo -> getByUserID($this -> user() ->id);

        return view('work', compact('player', 'gold'));
    }

    public function start(Request $request)
    {
        $duration = $request -> hours;
        $player = $this -> playerRepo -> getByUserID($this -> user() ->id);

        $this -> busy('w');
        $this -> workRepo -> create($player->id, $duration, Carbon::now()->addHours($duration));

        return redirect() -> route('player.work');
    }

    public function work(Work &$work)
    {
        $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $work -> end_date) -> subHours($work -> duration);
        return view('quest', [
            'start_date' => $start_date,
            'quest' => $work,
        ]);
    }

    public function reward(Work &$work)
    {
        $player = $this -> playerRepo -> getByUserID($this -> user() ->id);
        $amount_of_gold = (floor($player -> required_experience_points * 0.1) * $work->duration);
        $this -> playerRepo -> addGold($player->id, $amount_of_gold);
        $this -> busy('f');
        $this -> workRepo -> delete($work -> id);

        return redirect() -> route('player.work', ['gold' => $amount_of_gold]);
    }

    public function cancel()
    {
        $player = $this -> playerRepo -> getByUserID($this -> user() ->id);
        $work = $this -> workRepo -> getByPlayerId($player -> id);
        $this -> workRepo -> delete($work->id);
        $this -> busy('f');

        return redirect() -> route('player.work');
    }
}
