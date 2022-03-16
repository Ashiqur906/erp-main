<?php

use Luova\Direction\Models\District as LuovaDistrict;

if (!function_exists('get_direction_by')) {
    function get_direction_by($option)
    {
        $arrray = [];
        if ($option) {
            $datas =  LuovaDistrict::select($option)->whereNotNull($option)->groupBy($option)->orderBy($option, 'ASC')->get();
            foreach ($datas as $data) {
                $arrray[$data->$option] = $data->$option;
            }
        }

        return $arrray;
    }
}
if (!function_exists('get_direction_divistion')) {
    function get_direction_divistion($division = null)
    {

        if ($division) {
            $datas =  LuovaDistrict::select('division')->Where(['division' => $division,])->groupBy('division')->orderBy('division', 'ASC')->get();
        } else {
            $datas =  LuovaDistrict::select('division')->groupBy('division')->orderBy('division', 'ASC')->get();
        }

        return $datas;
    }
}
if (!function_exists('get_direction_district')) {
    function get_direction_district($request)
    {
        $datas = [];
        if ($request->get('division')) {
            $datas =  LuovaDistrict::select('district')->Where([
                'division' => $request->get('division')
            ])->groupBy('district')->orderBy('district', 'ASC')->get();
        }

        return $datas;
    }
}
if (!function_exists('get_direction_thana')) {
    function get_direction_thana($request)
    {
        $datas = [];
        if ($request->get('division') && $request->get('district')) {
            $datas =  LuovaDistrict::select('thana')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district')
            ])->groupBy('thana')->orderBy('thana', 'ASC')->get();
        }
        return $datas;
    }
}
if (!function_exists('get_direction_union')) {
    function get_direction_union($request)
    {
        $datas = [];
        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
        ) {
            $datas =  LuovaDistrict::select('union')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district'),
                'thana' => $request->get('thana')
            ])->groupBy('union')->orderBy('union', 'ASC')->get();
        }
        return $datas;
    }
}
if (!function_exists('get_direction_postoffice')) {
    function get_direction_postoffice($request)
    {
        $datas = [];
        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
            && $request->get('union')
        ) {
            $datas =  LuovaDistrict::select('postoffice')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district'),
                'thana' => $request->get('thana'),
                'union' => $request->get('union')
            ])->groupBy('postoffice')->orderBy('postoffice', 'ASC')->get();
        }
        return $datas;
    }
}
if (!function_exists('get_direction_postcode')) {
    function get_direction_postcode($request)
    {
        $datas = [];
        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
            && $request->get('union')
            && $request->get('postoffice')
        ) {
            $datas =  LuovaDistrict::select('postcode')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district'),
                'thana' => $request->get('thana'),
                'union' => $request->get('union'),
                'postoffice' => $request->get('postoffice')
            ])->groupBy('postcode')->orderBy('postcode', 'ASC')->get();
        }
        return $datas;
    }
}

if (!function_exists('get_direction_village')) {
    function get_direction_village($request)
    {
        $datas = [];
        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
            && $request->get('union')
            && $request->get('postoffice')
            && $request->get('postcode')
        ) {
            $datas =  LuovaDistrict::select('village')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district'),
                'thana' => $request->get('thana'),
                'union' => $request->get('union'),
                'postoffice' => $request->get('postoffice'),
                'postcode' => $request->get('postcode'),
            ])->groupBy('village')->orderBy('village', 'ASC')->get();
        }
        return $datas;
    }
}
if (!function_exists('get_direction_ward')) {
    function get_direction_ward($request)
    {
        $datas = [];
        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
            && $request->get('union')
            && $request->get('postoffice')
            && $request->get('postcode')
            && $request->get('village')
        ) {
            $datas =  LuovaDistrict::select('ward')->Where([
                'division' => $request->get('division'),
                'district' => $request->get('district'),
                'thana' => $request->get('thana'),
                'union' => $request->get('union'),
                'postoffice' => $request->get('postoffice'),
                'postcode' => $request->get('postcode'),
                'village' => $request->get('village'),
            ])->groupBy('ward')->orderBy('ward', 'ASC')->get();
        }
        return $datas;
    }
}
if (!function_exists('get_direction_union_ward')) {
    function get_direction_union_ward($request)
    {
        $where = [
            'division' => $request->get('division'),
            'district' => $request->get('district'),
            'thana' => $request->get('thana')
        ];




        if (
            $request->get('division')
            && $request->get('district')
            && $request->get('thana')
        ) {

            $union =  LuovaDistrict::select('union')->Where($where)
                ->whereNotNull('union')->groupBy('union')->orderBy('union', 'ASC')->get();

            if ($request->get('union')) {
                $where['union'] =  $request->get('union');
            }
            $postoffice = LuovaDistrict::select('postoffice')->Where($where)
                ->whereNotNull('postoffice')->groupBy('postoffice')->orderBy('postoffice', 'ASC')->get();
            if ($request->get('postoffice')) {
                $where['postoffice'] =  $request->get('postoffice');
            }

            $postcode = LuovaDistrict::select('postcode')->Where($where)
                ->whereNotNull('postcode')->groupBy('postcode')->orderBy('postcode', 'ASC')->get();

            if ($request->get('postcode')) {
                $where['postcode'] =  $request->get('postcode');
            }
            $village = LuovaDistrict::select('village')->Where($where)
                ->whereNotNull('village')->groupBy('village')->orderBy('village', 'ASC')->get();


            if ($request->get('village')) {
                $where['village'] =  $request->get('village');
            }
            $ward = LuovaDistrict::select('ward')->Where($where)
                ->whereNotNull('ward')->groupBy('ward')->orderBy('ward', 'ASC')->get();


            if ($request->get('ward')) {
                $where['ward'] =  $request->get('ward');
            }
            $para = LuovaDistrict::select('para')->Where($where)
                ->whereNotNull('para')->groupBy('para')->orderBy('para', 'ASC')->get();


            return [
                'union' => $union,
                'postoffice' => $postoffice,
                'postcode' => $postcode,
                'village' => $village,
                'ward' => $ward,
                'para' => $para,
            ];
        }

        return [
            'union' => [],
            'postoffice' => [],
            'postcode' => [],
            'village' => [],
            'ward' => [],
            'para' => [],
        ];
    }
}
