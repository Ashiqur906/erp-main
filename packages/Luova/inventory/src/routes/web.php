<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Luova\Inventory\Http\Controllers';

Route::namespace($namespace)->name('product.')->middleware(['web', 'auth'])->group(function () {
    Route::get('products', 'ProductController@index')->name('all');
    Route::get('product/add', 'ProductController@add')->name('add');
    Route::get('product/{id}/edit', 'ProductController@edit')->name('edit');
    Route::post('product/save', 'ProductController@store')->name('store');
});

Route::namespace($namespace)->name('category.')->middleware(['web', 'auth'])->group(function () {
    Route::get('categories', 'CategoryController@index')->name('all');
    Route::get('category/add', 'CategoryController@add')->name('add');
    Route::get('category/{id}/edit', 'CategoryController@edit')->name('edit');
    Route::post('category/save', 'CategoryController@store')->name('store');
});
Route::namespace($namespace)->name('unit.')->middleware(['web', 'auth'])->group(function () {
    Route::get('units', 'UnitController@index')->name('all');
    Route::get('unit/add', 'UnitController@add')->name('add');
    Route::get('unit/{id}/edit', 'UnitController@edit')->name('edit');
    Route::post('unit/save', 'UnitController@store')->name('store');
});
