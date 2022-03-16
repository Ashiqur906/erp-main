<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Address\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('address.')->middleware(['web', 'auth'])->group(function () {
    Route::get('address', 'AddressController@index')->name('index');
    Route::get('address/{id}/add', 'AddressController@add')->name('add');
    Route::post('address/save', 'AddressController@store')->name('store');
    Route::get('address/{id}/edit', 'AddressController@edit')->name('edit');
    Route::delete('/address/{id}/delete', 'AddressController@destroy')->name('delete');
});
Route::get('address/test', function () {
    return " wow your model working";
});
