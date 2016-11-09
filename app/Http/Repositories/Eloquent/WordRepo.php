<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 02.11.2016
 * Time: 15:59
 */

namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\IWordRepo;
use App\Word;
use Illuminate\Support\Facades\DB;

class WordRepo implements IWordRepo
{
    private $model;

    public function __construct(Word $model)
    {
        $this -> model = $model;
    }

    public function generate($type = null)
    {

        // if quest
        $result =   $this -> model -> where('type', 1) -> orderBy(DB::raw('RAND()')) -> first() -> word . ' ' .
                    $this -> model -> where('type', 2) -> orderBy(DB::raw('RAND()')) -> first() -> word;

        if (isset($type) && ($type == 'monster' || $type == 'item'))
            $result .= ' of ' . $this -> model -> where('type', 3) -> orderBy(DB::raw('RAND()')) -> first() -> word;

        return $result;
    }


}