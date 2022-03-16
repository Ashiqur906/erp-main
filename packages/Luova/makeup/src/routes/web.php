<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Makeup\Http\Controllers';



Route::namespace($namespace)->middleware(['web', 'role:admin|superadmin, guard:employee'])->name('admin.')->group(function () {

    Route::get('admin/settings', 'MakeupController@index')->name('settings');
    Route::post('admin/setting/store', 'MakeupController@store')->name('setting.store');
    Route::post('admin/setting/update', 'MakeupController@update')->name('setting.update');
});
Route::namespace($namespace)->middleware(['web'])->name('admin.')->group(function () {


    Route::get('admin/licence', 'MakeupController@licence')->name('setting.licence');
    Route::post('admin/licence/save', 'MakeupController@licence_save')->name('licence.save');
});
