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

class HelloController extends Controller
{

    public function actionIndex()
    {

        //查询数据
        $sql = "select * from test where id=1";
        $result = Test::findBySql($sql)->all();

        //占位符
        $sql1 = "select * from test where id=:id";
        $results = Test::findBySql($sql1, array(':id' => 1))->all();

        //查询id=1
        $result = Test::find()->where(['id' => 1])->all();

        //查询id>0
        $result = Test::find()->where(['>', 'id', 0])->all();

        //查询id>=1<=2
        $result = Test::find()->where(['between', 'id', 1, 2])->all();

        //like %title1%
        $result = Test::find()->where(['like', 'title', 'title1'])->all();


        //超级多的数据的时候怎么处理?将结果转换成数据
        $result = Test::find()->where(['like', 'title', 'title1'])->asArray()->all();
        //批量查询
        foreach (Test::find()->batch(1) as $test) {
            print_r(count($test));
        }

        print_r($result);
    }

    public function  deleteData()
    {
        //删除数据
        $result = Test::find()->where(['id' => 1])->all();
        $result[0]->delete();

        //或者这样
        Test::deleteAll('id>:id', array(':id' => 0));

    }

    public function addData()
    {
        //增加数据
        $result = new Test();
        $result->id = 3;
        $result->title = 'llllll';

        //对数据进行校验
        $result->validate();
        if ($result->hasErrors()) {
            //数据不合法
            return;
        }
        $result->save();
    }

    public function  editData()
    {
        //修改数据
        $test = Test::find()->where(['id' => 4])->one();
        $test->title = '11';
        $test->save();
    }

    public function sQuery()
    {
        //联合查询
        //根据顾客查询他的订单信息
        $custorm = Custorm::find()->where(['name' => '张三'])->one();
        $orders = $custorm->getOrders();
        //清除缓存
        //unset($custorm->getOrders());
        print_r($orders);

    }

    public function wQuery()
    {
        //联合查询
        //根据订单查询顾客信息
        $order = Order::find()->where(['id' => 1])->one();
        $custorms = $order->custorm;//为什么会补上one因为里面用的one
        print_r($custorms);

        //下面是性能优化+with
        $custorms = Custorm::find()->with('order')->all();
        foreach ($custorms as $custorm) {
            $orders = $custorm->orders;
        }

    }

    public function toView()
    {
        $this->render('edit', array(
            'var1' => 'lcc',
            'var2' => 'zgf'
        ));
    }
}