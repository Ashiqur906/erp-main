<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Receipt\Http\Controllers';

Route::namespace($namespace)->name('receipt.')->middleware(['web', 'auth'])->group(function () {
    Route::get('receipts', 'ReceiptController@index')->name('all');
    Route::get('receipt/add', 'ReceiptController@add')->name('add');
    Route::get('receipt/{id}/detail', 'ReceiptController@detail')->name('detail');
    Route::get('receipt/{id}/edit', 'ReceiptController@edit')->name('edit');
    Route::post('receipt/save', 'ReceiptController@store')->name('store');
    Route::get('receipt/ajax/rowitem', 'ReceiptController@ajax_rowitem')->name('ajax.rowitem');
    Route::get('receipt/ajax/account', 'ReceiptController@ajax_account')->name('ajax.account');
});


// Route::get('admin/receipt', function () {
//     return " wow your model working";
// });
