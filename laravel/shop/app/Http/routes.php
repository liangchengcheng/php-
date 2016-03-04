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
});

Route::get('login','loginController@index');

Route::get('register','registerController@index');

Route::any('service/validate_code/create', 'Service\ValidateController@create');

Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');

Route::any('service/validate_email', 'Service\ValidateController@validateEmail');

Route::post('service/register', 'Service\MemberController@register');
