<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Purchase\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('purchase.')->middleware(['web', 'auth'])->group(function () {
    Route::get('purchases', 'PurchaseController@index')->name('all');
    Route::get('purchase/add', 'PurchaseController@add')->name('add');
    Route::get('purchase/{id}/detail', 'PurchaseController@detail')->name('detail');
    Route::get('purchase/{id}/edit', 'PurchaseController@edit')->name('edit');
    Route::post('purchase/save', 'PurchaseController@store')->name('store');
    Route::get('purchase/ajax/rowitem', 'PurchaseController@ajax_rowitem')->name('ajax.rowitem');
    Route::get('purchase/ajax/product', 'PurchaseController@ajax_product')->name('ajax.product');
    Route::delete('purchase/{id}/destroy', 'PurchaseController@destroy')->name('destroy');
});


// Route::get('admin/purchase', function () {
//     return " wow your model working";
// });
