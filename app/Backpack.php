<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backpack extends Model
{
    public $timestamps = false;

    public function items()
    {
        return $this -> hasMany(BackpackItem::class) -> with('item');
    }
}
