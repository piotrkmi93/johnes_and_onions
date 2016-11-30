<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\PlayerRepo;
use App\Player;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function user()
    {
        return Auth::user();
    }

    protected function player()
    {
        $playerRepo = new PlayerRepo(new Player());
        return $playerRepo -> getByUserID($this -> user() -> id);
    }

    protected function busy($busy)
    {
        $playerRepo = new PlayerRepo(new Player());
        $id = $this -> player() -> id;
        return $playerRepo -> busy($id, $busy);
    }

    public function is_busy()
    {
        $playerRepo = new PlayerRepo(new Player());
        $busy = $this -> player() -> busy;
        return $busy == 'f' ? false : $busy;
    }
}
