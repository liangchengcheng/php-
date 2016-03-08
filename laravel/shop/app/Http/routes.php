<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Entity\Member;

Route::get('/', function () {
    return view('login');
});

//重定向的示例代码 
//Route::get('/testNamedRoute', function () {
//     
//    return redirect()->route('academy');
//     
//});
// 
////as 是给路由重新起名字的 
//Route::get('/hello/laravelacademy/{id}', ['as' => 'academy', function ($id) {
//     
//    return 'Hello LaravelAcademy ' . $id . '！';
//     
//}]);
Route::get('/login', 'View\MemberController@toLogin');

Route::get('/register', 'View\MemberController@toRegister');

//Route::any('service/validate_code/create', 'Service\ValidateController@create');
//Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');
//Route::any('service/validate_email', 'Service\ValidateController@validateEmail');
//Route::post('service/register', 'Service\MemberController@register');
//Route::post('service/login', 'Service\MemberController@login');

//路由组的概念
Route::group(['prefix'=>'service'],function(){
    Route::any('validate_code/create', 'Service\ValidateController@create');
    Route::any('validate_phone/send', 'Service\ValidateController@sendSMS');
    Route::any('validate_email', 'Service\ValidateController@validateEmail');
    Route::post('register', 'Service\MemberController@register');
    Route::post('login', 'Service\MemberController@login');
});
