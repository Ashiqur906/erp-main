<?php

use Luova\Inventory\Models\Category;
use Luova\Inventory\Models\Product;
use Luova\Inventory\Models\Unit;
use Luova\Purchase\Models\PurchaseDetail;
use Luova\Sale\Models\SaleDetail;

if (!function_exists('is_inventory')) {
    function is_inventory()
    {
        return true;
    }
}

if (!function_exists('lv_categoriesArray')) {
    function lv_categoriesArray()
    {
        $lists = Category::where(['is_active' => 'Yes'])->orderby('title', 'asc')->get();
        $result = [];
        foreach ($lists as $key => $list) {
            $result[$list->id] = $list->title;
        }

        return $result;
    }
}
if (!function_exists('lv_unitsArray')) {
    function lv_unitsArray()
    {
        $lists = Unit::where(['is_active' => 'Yes'])->orderby('title', 'asc')->get();
        $result = [];
        foreach ($lists as $key => $list) {
            $result[$list->id] = $list->title;
        }

        return $result;
    }
}
if (!function_exists('ClosingStock')) {
    function ClosingStock()
    {
        return Product::get()->sum(function ($row) {
            return $row->avg_purchase * $row->current_stock;
        });

      
    }
}
if (!function_exists('CurrentPeriod')) {
    function CurrentPeriod()
    {
        return SaleDetail::select('sale_details.qty as qty','sale_details.total as total','products.avg_purchase as avgp')
        ->leftJoin('products', 'products.id', '=', 'sale_details.product_id')->get()->sum(function ($row) {
            return $row->total -($row->qty * $row->avgp);
        });
    }
}
