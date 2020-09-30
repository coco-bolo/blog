<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/add', 'UserController@add');
Route::get('/user/index', 'UserController@index');
Route::get('/user/edit/{id}', 'UserController@edit');

Route::post('/user/store', 'UserController@store');
Route::post('/user/update', 'UserController@update');
Route::get('/user/destroy', 'UserController@destroy');