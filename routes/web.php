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

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('login', 'LoginController@login');
    Route::post('doLogin', 'LoginController@doLogin');
    Route::post('checkUsername', 'LoginController@checkUsername');
    Route::post('checkCaptcha', 'LoginController@checkCaptcha');
    Route::get('captcha', 'LoginController@captcha');
    Route::get('noAccess', 'LoginController@noAccess');
});

Route::prefix('admin')->namespace('Admin')->middleware(['islogin', 'hasrole'])->group(function(){
    Route::get('index', 'LoginController@index');
    Route::get('welcome', 'LoginController@welcome');
    Route::get('logout', 'LoginController@logout');
    
    Route::delete('user/delAll', 'UserController@delAll');
    Route::resource('user', 'UserController');
    
    
    // Route::delete('role/delAll', 'RoleController@delAll');
    // Route::get('role/{id}/auth', 'RoleController@auth');
    Route::resource('role', 'RoleController');
    // Route::get('aaa', 'RoleController@aaa');

    Route::resource('manager', 'ManagerController');
    
    Route::get('permission/createNode', 'PermissionController@createNode');
    Route::post('permission/storeNode', 'PermissionController@storeNode');
    Route::resource('permission', 'PermissionController');

    Route::resource('article', 'ArticleController');
    Route::post('article/thumbUpload', 'ArticleController@thumbUpload')->name('article.thumbUpload');
    Route::post('article/imgUpload', 'ArticleController@imgUpload')->name('article.imgUpload');

    Route::get('category/createTop', 'CategoryController@createTop')->name('category.createTop');
    Route::get('category/{category}/editTop', 'CategoryController@editTop')->name('category.editTop');
    Route::resource('category', 'CategoryController');
});

Route::prefix('home')->namespace('Home')->group(function(){
    Route::get('index', 'IndexController@index');
    Route::post('collect', 'IndexController@collect');
});