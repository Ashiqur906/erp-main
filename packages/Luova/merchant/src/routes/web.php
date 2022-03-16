<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Merchant\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('merchant.')->middleware(['web', 'auth'])->group(function () {
    Route::get('merchant', 'MerchantController@index')->name('index');
    Route::get('merchant/add', 'MerchantController@add')->name('add');
    Route::post('merchant/save', 'MerchantController@store')->name('store');
    Route::get('merchant/{id}/edit', 'MerchantController@edit')->name('edit');
    Route::delete('merchant/{id}/delete', 'MerchantController@destroy')->name('delete');
});

// Route::get('admin/merchant', function () {
//     return " wow your model working";
// });
