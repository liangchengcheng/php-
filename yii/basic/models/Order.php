<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/3/28
 * Time: 上午7:23
 */
namespace app\models;

use yii\db\ActiveRecord;
class Order extends ActiveRecord{

    public function getCustorm(){
        //订单就一个顾客就hasONe
        return $this->hasOne(Custorm::className(),['id'=>'custorm_id'])->asArray();
    }

}