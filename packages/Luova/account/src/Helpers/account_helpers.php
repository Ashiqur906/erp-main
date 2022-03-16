<?php

use App\Models\User;
use Luova\Account\Models\Account;
use Luova\Account\Models\AccountHead;

if (!function_exists('is_account')) {
    function is_account()
    {
        return true;
    }
}
if (!function_exists('userSelect')) {
    function userSelect()
    {
        $users = User::get();
        $result = [];
        foreach($users as $list){
            $result[$list->id] = $list->name.'('.$list->id.')'; 
        }
        return $result;
    }
}
if (!function_exists('AccountHeadSelect')) {
    function AccountHeadSelect()
    {
        $heads = AccountHead::get();
        $result = [];
        foreach($heads as $list){
            $result[$list->id] = $list->title.'('.$list->type.')'; 
        }
        return $result;
    }
}
if (!function_exists('AccountSelect')) {
    function AccountSelect($head =null)
    {
       // dd($head);
        $data = Account::select('*');
        if($head){
            if(is_array($head)){
                $data = $data->whereIn('ac_head',$head );
            }else{
                $data = $data->where('ac_head',$head );
            }
           
        }
        $data = $data->oldest()->get();
        $result = [];
        foreach($data as $list){
            $result[$list->id] = $list->title.'('.$list->code.')'; 
        }
        return $result;
    }
}

// if (!function_exists('AccountHeadType')) {
//     function AccountHeadType($type =null)
//     {
//         $data = AccountHead::select('*');

//         ->join('contacts', function ($join) {
//             $join->on('users.id', '=', 'contacts.user_id')->orOn(...);
//         })
        
//         if($type){
//             $data = $data->where('type',$type );
//         }
//         $data = $data->oldest()->get();

//         dd($data);


//         $result = [];
//         foreach($data as $list){
//             $result[$list->id] = $list->title.'('.$list->code.')'; 
//         }
//         return $result;
//     }
// }
