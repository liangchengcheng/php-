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
        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
//        下面为一些示例，假设yii\base\Application::controllerNamespace控制器命名空间为 app\controllers:
//
//        article 对应 app\controllers\ArticleController;
//        post-comment 对应 app\controllers\PostCommentController;
//        admin/post-comment 对应 app\controllers\admin\PostCommentController;
//        adminPanels/post-comment 对应 app\controllers\adminPanels\PostCommentController.


    }

    /**
     * 场景和规则的基本的使用
     */
    public function actionLike()
    {
        $model = new \app\models\Country();

        // 用户输入数据赋值到模型属性
        $model->attributes = \Yii::$app->request->post('Country');

        if ($model->validate()) {
            // 所有输入数据都有效 all inputs are valid
        } else {
            // 验证失败：$errors 是一个包含错误信息的数组
            $errors = $model->errors;
        }
    }

    public function actionJson()
    {
        // 将模型转换为数组最简单的方式是使用 yii\base\Model::attributes 属性，例如：
        //或者yii\base\Model::toArray()  这个可以指定字段
        $country = \app\models\Country::findOne(100);
        $array = $country->attributes;
    }
}

