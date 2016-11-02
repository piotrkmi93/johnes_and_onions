<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterLookVariant extends Model
{
    public $timestamps = false;

    public function lookVariantColor(){
        return $this -> belongsTo(LookVariantColor::class);
    }
}