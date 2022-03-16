<?php

use Luova\Makeup\Models\Makeup;

if (!function_exists('makeup_helpers')) {
    function makeup_helpers()
    {

        return true;
    }
}
if (!function_exists('lv_makeup')) {
    function lv_makeup($key)
    {
        $data = Makeup::where(['key' => $key])->get()->first();
        if ($data) {
            return $data->value;
        }

        return '';
    }
}


if (!function_exists('cat_chil')) {
    function cat_chil($id)
    {
       $data = DB::table('categories')->where(['status' => 1, 'parent_id'=> $id])->orderBy('name', 'ASC')->get();
     
        return $data;
    }
}
