<?php


http://laravelacademy.org/post/762.html


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
//此处就是对laravel进行基本的路由的配置.

Blade::setEscapedContentTags('<%%', '%%>');
Route::get('/', function () {
    return View::make('index');
});

Route::group(array('prefix' => 'api/v1'), function () {
    Route::resource('users', 'UsersController');
});


//index.blade.php
//主要的模板可以给其他视图引用.
<
!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns = "http://www.w3.org/1999/xhtml" ng - app = "myApp" >
    <head >
        <meta http - equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title > Laravel - angularJS</title >
        <!-- <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" ></script > -->
        <script type = "text/javascript" src = "app/js/jquery.min.js" ></script >
        <script src = "app/js/jquery-ui.js" type = "text/javascript" ></script >
    </head >

    <body >

        <div class="main-container" ng - view ></div >

        <script src = "app/lib/angular/angular.js" ></script >
        <script src = "app/lib/angular/angular-resource.min.js" ></script >
        <script src = "app/js/app.js" ></script >
        <script src = "app/js/services.js" ></script >
        <script src = "app/js/controllers.js" ></script >
        <script src = "app/js/filters.js" ></script >
        <script src = "app/js/directives.js" ></script >
        <script src = "app/js/date.js" ></script >
        <script src = "app/lib/angular/ui_bootstrap.js" ></script >
        <script src = "app/lib/angular/ui-bootstrap-tpls-0.9.0.min.js" ></script >
        <script src = "app/js/underscore.js" ></script >
        <script >
angular . module("myApp") . constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
        </script >
    </body >
</html >


//public/app/js/app.js[augular.js]
//此处详情请看angular的手册和那个mongodb  angular  node的书上最后案例的详解
//下面的代码可能已经过时
public/app/js/app.js：
'use strict'
var app = angular . module('myApp', ['ngResource', 'myApp.filters', 'myApp.services',
        'myApp.directives', 'myApp.controllers']);
app . config(function ($routeProvider) {
    $routeProvider . when('/',{
       templateUrl:'app/particals/users/index.html',
        controller:'UserListCtrl'
    });
     $routeProvider.otherwise({templateUrl:'app/partials/404.html'});
})

//public/app/js/app.js[augular.js]
//此处详情请看angular的手册和那个mongodb  angular  node的书上最后案例的详解
//下面的代码可能已经过时
public/app/js/controllers.js：
var app = angular.module('myApp.controllers', ['ui.date', 'ui.bootstrap']);
app.controller('UserListCtrl', ['$scope', 'UsersFactory', '$location',
    function ($scope, UsersFactory, $location) {
        $scope.users = null;
        UsersFactory.query(function(res){
            //获取到user对象
            $scope.users = res;
        });
        //console.log($scope.users);
    }
]);


public/app/js/services.js：
'use strict';
/* Services */
var app = angular.module('myApp.services', []);
app.factory('UsersFactory', function ($resource, CSRF_TOKEN) {
    return $resource('/api/v1/users', { 'csrf_token' :CSRF_TOKEN }, {
        //query: { method: 'GET', isArray: true },
        //create: { method: 'POST' }
    })
});










//UsersControllers.php
class UsersController extends BaseController {
    protected $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function index(){
        $users=DB::table('users')->get();
        return Response::json($users,200);
    }
}








//index.html
<div class="contentWrapper">
    <div class="contentInnerWrapper">
        <table>
            <tr>
                <th><div class="gap">Email</div></th>
                <th>First Name</th>
                <th>last name</th>
                <th>Status</th>
                <th>Created</th>
            </tr>
            <tr ng-repeat="data in users">
                <td>
                    <div class="subTitle">{{data.email}}</div>
                </td>
                <td>{{data.first_name}}</td>
                <td>{{data.last_name}}</td>
                <td ng-show="data.activated">Activate</td>
                <td ng-hide="data.activated">De-activate</td>
                <td>{{data.created_at}}</td>
            </tr>
        </table>
    </div>
</div>