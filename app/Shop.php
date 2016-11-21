<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $timestamps = false;

    public function backpack()
    {
        return $this -> belongsTo(Backpack::class) -> with('items');
    }
}
