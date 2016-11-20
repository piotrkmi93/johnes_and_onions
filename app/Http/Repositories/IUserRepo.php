<?php

/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 19.10.2016
 * Time: 15:42
 */

namespace App\Http\Repositories;

interface IUserRepo
{

    public function update($id, $password);
    public function delete($id);
    public function passwordCorrect($id, $password);

}