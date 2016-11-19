<?php

/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 19.10.2016
 * Time: 15:43
 */

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\IUserRepo;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepo implements IUserRepo
{

    private $model;

    public function __construct(User $model)
    {
        $this -> model = $model;
    }

    public function update($id, $password)
    {
        $user = $this -> model -> find($id);
        $user -> password = $password;
        return $user -> save() ? $user : null;
    }

    public function delete($id)
    {
        return $this -> model -> find($id) -> delete();
    }

    public function passwordCorrect($id, $password)
    {
        return Hash::check($password, $this -> model -> find($id) -> password);
    }
}