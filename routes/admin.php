<?php
/**
 * Created by PhpStorm.
 * User: 万鑫
 * Date: 2018/12/28
 * Time: 11:18
 */

Route::namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::any('login', 'AdminController@login');
    Route::resource('admin', 'AdminController');
    Route::resource('user', 'UserController');
    Route::resource('menu', 'MenuController');
    Route::resource('permission', 'PermissionController');
    Route::resource('role', 'RoleController');
    Route::resource('table', 'TableController');
    Route::resource('field', 'FieldController');
});
Route::namespace('Admin')->group(function () {
    Route::post('getToken', 'AdminController@getToken');
});