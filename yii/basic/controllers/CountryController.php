<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/3/28
 * Time: 上午7:24
 */
namespace app\controllers;

use app\models\Order;
use yii\web\Controller;
use app\models\Test;
use app\models\Custorm;


//http://www.yiichina.com/doc/guide/2.0/structure-controllers#routes
class HelloController extends Controller
{

    //路由
    //http://localhost/index.php?
    //r=site/view
    //上面的会访问到controllers/siteController的控制器
    //里面的actionView(){}


    //r=admin/site/view
    //会访问到modules/admin/controllers/siteController.PHP


    //ControllerID/ActionID

    //如果属于模块下的控制器，使用如下格式：

    //ModuleID/ControllerID/ActionID

    public function actions(){
        return[
            'update'=>'controllers.UpdateAction'
        ];
    }

    //CurlManager
    //$url=\Yii:$app->urlManager->createUrl($params);

    //url=\Yii:$app->urlManager->createAbsoluteUrl($params);

    //post/update?id=100
    //$url=\Yii:$app->urlManager->createUrl(['post/update','id=>100]);

}

