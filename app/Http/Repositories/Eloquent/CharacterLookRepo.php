<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 13:40
 */

namespace App\Http\Repositories\Eloquent;


use App\CharacterLook;
use App\Http\Repositories\ICharacterLookRepo;

class CharacterLookRepo implements ICharacterLookRepo
{

    private $model;

    public function __construct(CharacterLook $model)
    {
        $this -> model = $model;
    }

    public function create($hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id)
    {
        $characterLook = $this -> model -> newInstance();
        return $this -> save($characterLook, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id);
    }

    public function edit($id, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id)
    {
        $characterLook = $this -> get($id);
        return $this -> save($characterLook, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id);
    }

    public function delete($id)
    {
        return $this -> get($id) -> delete();
    }

    public function get($id)
    {
        return $this -> model -> find($id);
    }

    private function save(&$characterLook, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id)
    {
        $characterLook -> hair_variant_id = $hair_variant_id;
        $characterLook -> eyebrow_variant_id = $eyebrow_variant_id;
        $characterLook -> eyes_variant_id = $eyes_variant_id;
        $characterLook -> mouth_variant_id = $mouth_variant_id;
        $characterLook -> head_variant_id = $head_variant_id;
        $characterLook -> nose_variant_id = $nose_variant_id;
        return $characterLook -> save() ? $characterLook : null;
    }

}