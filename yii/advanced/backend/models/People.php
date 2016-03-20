<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sex
 * @property string $class
 * @property string $address
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc 表名
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc  检测规定
     */
    public function rules()
    {
        return [
            [['sex'], 'integer'],
            [['name', 'class', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc 对应的汉字
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'class' => 'Class',
            'address' => 'Address',
        ];
    }
}
