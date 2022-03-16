<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Direction\Http\Controllers';

Route::namespace($namespace)->name('direction.')->middleware(['web', 'outlet'])->group(function () {
    Route::get('admin/direction', 'DirectionController@index')->name('index');
    Route::get('admin/direction/add', 'DirectionController@add')->name('add');
    Route::get('admin/direction/{id}/edit', 'DirectionController@edit')->name('edit');
    Route::get('admin/direction/{id}/copy', 'DirectionController@copy')->name('copy');
    Route::get('admin/direction/{id}/delete', 'DirectionController@delete')->name('delete');
    Route::post('admin/direction/save', 'DirectionController@store')->name('store');
    Route::get('admin/direction/find', 'DirectionController@find')->name('find');
});
