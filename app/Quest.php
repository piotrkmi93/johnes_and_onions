<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public $timestamps = false;

    public function player(){
        return $this -> belongsTo(Player::class);
    }

    public function monster(){
        return $this -> belongsTo(Monster::class);
    }

    public function item(){
        return $this -> belongsTo(Item::class);
    }
}
