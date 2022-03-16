<?php


if (!function_exists('lv_document')) {
    function lv_document()
    {
        $arr = [];
        if (function_exists('lv_active_option')) {
            $datas = lv_active_option('Document');
            $dataCount = count($datas);
            if ($dataCount > 0) {
                foreach ($datas as $data) {
                    $arr[$data->name] = $data->name;
                }
            }
        }
        return $arr;
    }
}
