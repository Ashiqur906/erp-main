<?php

use Luova\Inventory\Models\Product;

if (!function_exists('is_purchase')) {
    function is_purchase()
    {
        return true;
    }
}

if (!function_exists('productFA')) {

    function productFA()
    {

        $products = Product::get();

        $result = [];
        foreach ($products as $key => $list) {
            $result[$list->id] = $list->title . '(' . $list->code . ')';
        }

        return $result;
    }
}
