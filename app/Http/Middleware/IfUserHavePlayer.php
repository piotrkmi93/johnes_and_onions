<?php

namespace App\Http\Middleware;

use App\Http\Repositories\IPlayerRepo;
use Closure;
use Illuminate\Support\Facades\Auth;

class IfUserHavePlayer
{
    private $playerRepo;

    public function __construct(IPlayerRepo $playerRepo)
    {
        $this -> playerRepo = $playerRepo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $player = $this -> playerRepo -> getByUserID(Auth::user()->id);
        if (!isset($player)){
            return redirect()->route('creator');
        }

        return $next($request);
    }
}
