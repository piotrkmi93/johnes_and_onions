<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 13:32
 */

namespace App\Http\Repositories\Eloquent;


use App\CharacterLookVariant;
use App\Http\Repositories\ICharacterLookVariantRepo;
use Illuminate\Support\Facades\DB;

class CharacterLookVariantRepo implements ICharacterLookVariantRepo
{

    private $model;

    public function __construct(CharacterLookVariant $model)
    {
        $this -> model = $model;
    }

    public function get($id)
    {
        return $this -> model -> with('lookVariantColor') -> find($id);
    }

    public function getAll()
    {
        return $this -> model -> with('lookVariantColor') -> get();
    }

    public function getRandom($type)
    {
        return $this -> model -> where('type', $type) -> orderBy(DB::raw('RAND()')) -> first();
    }


}