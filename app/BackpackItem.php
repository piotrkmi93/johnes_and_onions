<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackpackItem extends Model
{
    public $timestamps = false;

    public function backpack()
    {
        return $this -> belongsTo(Backpack::class) -> with('item');
    }

    public function item()
    {
        return $this -> belongsTo(Item::class);
    }
}
