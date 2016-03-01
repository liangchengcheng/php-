<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('test',function(){
    return 'get请求';
});

Route::any('test',function(){
    return 'get post 请求';
});

//Route::post('test',function(){
//    return 'post请求';
//});

//指定到固定的MyController
Route::get('about','MyController@getAbout');
Route::resource('user','UserController');
//这里懒一点
Route::get('home',function(){
    $name='111111';
    return view('home');
});