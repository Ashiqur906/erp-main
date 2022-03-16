<?php

use Illuminate\Support\Facades\Route;


Route::get('/unread/notification', 'HomeController@unread_notification')->name('unread.notification');
Route::get('/all/notification', 'HomeController@all_notification')->name('all.notification');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('admin/hr/user/register', 'Auth\RegisterController@showRegistrationForm')->name('admin.hr.user.register')->middleware('auth');
Route::post('admin/hr/user/register', 'Auth\RegisterController@register')->middleware('auth');
Route::get('admin', 'HR\HumanResourcesController@dashboard')->middleware('auth');
Route::get('/', 'HR\HumanResourcesController@dashboard')->middleware('auth');
Route::get('dashboard', 'HR\HumanResourcesController@dashboard')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/media', '\ctf0\MediaManager\App\Controllers\MediaController@index')->name('admin.media.index');


Route::namespace('HR')->prefix('admin/hr')->name('admin.hr.')->group(function () {
    Route::get('users', 'HumanResourcesController@users')->name('users');
    Route::get('user/{id}/view', 'HumanResourcesController@show')->name('user.view');
    Route::get('user/{id}/edit', 'HumanResourcesController@edit')->name('user.edit');
    Route::get('user/add', 'HumanResourcesController@user_add')->name('user.add');
    Route::post('user/update', 'HumanResourcesController@update')->name('user.update');
    Route::get('roles', 'HumanResourcesController@roles')->name('roles');
    Route::post('role/save', 'HumanResourcesController@role_store')->name('role.save');
    Route::post('permision/save', 'HumanResourcesController@permision_store')->name('permision.save');
    Route::get('role/{id}/permision', 'HumanResourcesController@role_permision')->name('role.permision');
    Route::get('role/ajax/{id?}', 'HumanResourcesController@role_ajax')->name('role.ajax');
    Route::get('role/permission/{id?}', 'HumanResourcesController@permission_ajax')->name('permission.ajax');
    Route::post('role/assaing/permission', 'HumanResourcesController@role_permission_assaing')->name('role.permission.assaing');
});


Route::get('test12', function () {
    return 'hasan';
});
