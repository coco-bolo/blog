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

Route::get('/admin/login', 'Admin\LoginController@login');
Route::post('/admin/doLogin', 'Admin\LoginController@doLogin');
Route::post('/admin/checkUsername', 'Admin\LoginController@checkUsername');
Route::post('/admin/checkCaptcha', 'Admin\LoginController@checkCaptcha');
Route::get('/admin/captcha', 'Admin\LoginController@captcha');
