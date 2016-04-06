<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/3/28
 * Time: 上午7:24
 */
namespace app\controllers;

use app\models\Country;
use app\models\Order;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Test;
use app\models\Custorm;

/**
 * 关于分页的基本的代码
 * http://www.xker.com/page/e2014/1205/148195.html
 * http://www.yiichina.com/code/107
 * Class CountryController
 * @package app\controllers
 */
class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        //返回分页的数据
        return $this->render('index',[
            'countries'=>$countries,
            'pagination'=>$pagination,
        ]);

    }
}

