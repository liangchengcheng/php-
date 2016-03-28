<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/3/28
 * Time: 上午7:23
 */
namespace app\models;

use yii\db\ActiveRecord;
class Custorm extends ActiveRecord{

    public function  getOrders(){

        $order = $this->hasMany('app\models\Order', ['custorm_id' => 'id'])
            ->asArray()->all();
        return $order;
    }

}