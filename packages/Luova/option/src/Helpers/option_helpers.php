<?php

use Luova\Option\Models\Option;

if (!function_exists('luova_option')) {
    function luova_option()
    {

        $default = [
            'id' => null,
            'name' => null,
            'type' => null
        ];


        return $default;
    }
}

if (!function_exists('lv_get_option')) {
    function lv_get_option($type)
    {

        $data = Option::where(['type' => $type])->orderBy('sort_by', 'ASC')->get();


        return $data;
    }
}
if (!function_exists('lv_get_option_arr')) {
    function lv_get_option_arr($type)
    {
        $result = [];

        $datas = Option::where(['type' => $type])->orderBy('sort_by', 'ASC')->get();
        foreach ($datas as $data) {
            $result[$data->name] = $data->name;
        }


        return $result;
    }
}
if (!function_exists('lv_active_option')) {
    function lv_active_option($type)
    {

        $data = Option::where(['type' => $type, 'is_active' => 'Yes'])->orderBy('sort_by', 'ASC')->get();


        return $data;
    }
}
