<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/4/14
 * Time: 上午8:26
 */
//下面的代码是基于Laravel4 要是你使用的是最新版本的话,需要修改相关代码






//app/route.php

//设置输出原生数据的标签
//相当于Laravel 5中的{!!!!}，对应设置方法为setRawTags
Blade::setContentTags('<%', '%>');

//设置输出经HTML转义数据的标签
//相当于Laravel 5中的{{}}或{{{}}}，对应设置方法为setContentTags或setEscapedContentTags
Blade::setEscapedContentTags('<%%', '%%>');
Route::get('/',function(){
    return View::make('index');
});

Route::group(array('prefix'=>'api/v1'),function(){
   Route::resource('users','UsersController');
});

