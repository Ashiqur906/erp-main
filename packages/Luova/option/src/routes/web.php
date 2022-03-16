<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Option\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('option.')->middleware(['web', 'auth'])->group(function () {
    Route::get('option', 'OptionController@index')->name('index');
    Route::post('option/save', 'OptionController@store')->name('store');
    Route::get('option/{id}/edit', 'OptionController@edit')->name('edit');
    Route::delete('/option/{id}/delete', 'OptionController@destroy')->name('delete');
    // Route::get('/option/gets', 'OptionController@gets')->name('gets');
});
