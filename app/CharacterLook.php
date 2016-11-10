<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterLook extends Model
{
    public $timestamps = false;

    public function bodyVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function hairVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function eyebrowVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function eyesVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function mouthVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function headVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }

    public function noseVariant(){
        return $this -> belongsTo(CharacterLookVariant::class);
    }
}
