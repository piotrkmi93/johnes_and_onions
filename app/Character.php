<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public $timestamps = false;

    public function characterLook(){
        return $this -> belongsTo(CharacterLook::class)
            -> with('hairVariant')
            -> with('eyebrowVariant')
            -> with('eyesVariant')
            -> with('mouthVariant')
            -> with('headVariant')
            -> with('noseVariant');
    }
}
