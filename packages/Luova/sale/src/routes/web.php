<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Sale\Http\Controllers';

Route::namespace($namespace)->name('sale.')->middleware(['web', 'auth'])->group(function () {
    Route::get('sales', 'SaleController@index')->name('all');
    Route::get('sale/add', 'SaleController@add')->name('add');
    Route::get('sale/{id}/detail', 'SaleController@detail')->name('detail');
    Route::get('sale/{id}/edit', 'SaleController@edit')->name('edit');
    Route::post('sale/save', 'SaleController@store')->name('store');
    Route::get('sale/ajax/rowitem', 'SaleController@ajax_rowitem')->name('ajax.rowitem');
    Route::get('sale/ajax/product', 'SaleController@ajax_product')->name('ajax.product');
});


// Route::get('admin/sale', function () {
//     return " wow your model working";
// });
