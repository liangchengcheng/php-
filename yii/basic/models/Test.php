<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/3/28
 * Time: 上午7:23
 */
namespace app\models;

use yii\db\ActiveRecord;
class Test extends ActiveRecord{


    public function rules(){
        //数据的基本的验证
        return[
            ['id','integer'],
            ['title','string','length'=>[0,5]]
        ];
    }
}