<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

if (!function_exists('get_rolse_arr')) {
    function get_rolse_arr()
    {
        $result = [];
        $roles = Role::get();


        foreach ($roles as $role) {
            $result[$role->id] = $role->name;
        }

        return $result;
    }
}


if (!function_exists('getURole')) {
    function getURole($id)
    {
        $user =  User::find($id);
        $myroles = $user->getRoleNames();


        if (count($myroles) > 0) {

            $myrole = $myroles[0];

            return Role::where(['name' => $myrole])->first();
        }

        return null;
    }
}
if (!function_exists('getRoleName')) {
    function getRoleName($id)
    {
        $user =  User::find($id);
        $myroles = $user->getRoleNames();


        if (count($myroles) > 0) {

            $myrole = $myroles[0];

            return Role::where(['name' => $myrole])->first()->name;
        }

        return null;
    }
}
if (!function_exists('phpslug')) {
    function phpslug($string)
    {
        $slug = preg_replace('/[-\s]+/', '-', strtolower(trim($string)));
        return $slug;
    }
}

if (!function_exists('dynamicslug')) {
    function dynamicslug(array $options)
    {
        $default = [
            'slug' => null,
            'table' => null,
            'column' => 'slug',
            'id' => null,
        ];
        $search = array_merge($default, $options);
        $slug = phpslug($search['slug']);
        $data = DB::table($search['table'])->where($search['column'], 'like', $slug . '%');

        if ($search['id']) {
            $data = $data->where('id', '!=', $search['id']);
        }
        $data = $data->get();
        if (!$data->contains($search['column'], $slug)) {

            return $slug;
        }
        $count = count($data) + 1;

        for ($i = 1; $i <= $count; $i++) {
            $newSlug = $slug . '-' . $i;

            if (!$data->contains($search['column'], $newSlug)) {
                return $newSlug;
            }
        }
    }
}


if (!function_exists('money')) {
    function money($valu)
    {
        return number_format($valu,2). ' Tk.';
    }
}
if (!function_exists('dmy')) {
    function dmy($valu)
    {
        return date('d-M-Y',strtotime($valu));
    }
}