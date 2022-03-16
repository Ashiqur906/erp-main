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
if (!function_exists('lv_document_file')) {
    function lv_document_file($file)
    {
        $html = '';
        if (!empty($file)) {
            $details = pathinfo($file);
            if (!empty($details['extension'])) {
                if ($details['extension'] == 'jpg' || $details['extension'] == 'png') {
                    $html .= '<img src="' . $file . '" style="height:80px" /> 
                            <br> <a href="' . $file . '" target="_blank">View</a>';
                } else {
                    $html .= '<a href="' . $file . '" target="_blank"> <span class="material-icons nav-icon" style="font-size:50px">text_snippet</span></a>';
                }
            }
        }
        return $html;
    }
}
