<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Payment\Http\Controllers';

Route::namespace($namespace)->name('payment.')->middleware(['web', 'auth'])->group(function () {
    Route::get('payments', 'PaymentController@index')->name('all');
    Route::get('payment/add', 'PaymentController@add')->name('add');
    Route::get('payment/{id}/detail', 'PaymentController@detail')->name('detail');
    Route::get('payment/{id}/edit', 'PaymentController@edit')->name('edit');
    Route::post('payment/save', 'PaymentController@store')->name('store');
    Route::get('payment/ajax/rowitem', 'PaymentController@ajax_rowitem')->name('ajax.rowitem');
    Route::get('payment/ajax/account', 'PaymentController@ajax_account')->name('ajax.account');
});


// Route::get('admin/payment', function () {
//     return " wow your model working";
// });
