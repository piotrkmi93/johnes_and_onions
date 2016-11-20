<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IUserRepo;
use Illuminate\Http\Request;

use App\Http\Requests;


class OptionsController extends Controller
{
    private $userRepo, $characterRepo, $playerRepo;

    public function __construct(IUserRepo $userRepo, ICharacterRepo $characterRepo, IPlayerRepo $playerRepo)
    {
        $this -> userRepo = $userRepo;
        $this -> characterRepo = $characterRepo;
        $this -> playerRepo = $playerRepo;
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

}
