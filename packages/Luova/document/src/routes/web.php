<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Document\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('document.')->middleware(['web', 'auth'])->group(function () {
    Route::get('document', 'DocumentController@index')->name('index');
    Route::get('document/{id}/add', 'DocumentController@add')->name('add');
    Route::post('document/save', 'DocumentController@store')->name('store');
    Route::get('document/{id}/edit', 'DocumentController@edit')->name('edit');
    Route::delete('/document/{id}/delete', 'DocumentController@destroy')->name('delete');
});
Route::get('document/test', function () {
    return " wow your model working";
});
