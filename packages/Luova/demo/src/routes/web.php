<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Sale\Http\Controllers';

// Route::namespace($namespace)->prefix('admin')->name('blank.')->middleware(['web', 'auth'])->group(function () {
//     Route::get('blank', 'BlankController@index')->name('index');
//     Route::post('blank/save', 'BlankController@store')->name('store');
//     Route::get('blank/{id}/edit', 'BlankController@edit')->name('edit');
//     Route::delete('/blank/{id}/delete', 'BlankController@destroy')->name('delete');
// });
Route::get('admin/sale', function () {
    return " wow your model working";
});
