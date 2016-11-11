<?php
/**
 * Created by PhpStorm.
 * User: Piotr Kmiecik
 * Date: 29.10.2016
 * Time: 13:37
 */

namespace App\Http\Repositories;


interface ICharacterLookRepo
{

    public function create($body_variant_id, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id);
    public function edit($id, $body_variant_id, $hair_variant_id, $eyebrow_variant_id, $eyes_variant_id, $mouth_variant_id, $head_variant_id, $nose_variant_id);
    public function delete($id);
    public function get($id);
}