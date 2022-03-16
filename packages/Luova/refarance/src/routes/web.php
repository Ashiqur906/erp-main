<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Refarance\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('refarance.')->middleware(['web', 'auth'])->group(function () {
    Route::get('refarance', 'RefaranceController@index')->name('index');
    Route::get('refarance/{id}/add', 'RefaranceController@add')->name('add');
    Route::post('refarance/save', 'RefaranceController@store')->name('store');
    Route::get('refarance/{id}/edit', 'RefaranceController@edit')->name('edit');
    Route::delete('/refarance/{id}/delete', 'RefaranceController@destroy')->name('delete');
});
Route::get('refarance/test', function () {
    return " wow your model working";
});
