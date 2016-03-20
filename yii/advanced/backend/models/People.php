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

    public $id;
    public $name;
    public $sex;
    public $class;
    public $address;

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

//        return [
//            // 在"register" 场景下 username, email 和 password 必须有值
//            [['username', 'email', 'password'], 'required', 'on' => 'register'],
//
//            // 在 "login" 场景下 username 和 password 必须有值
//            [['username', 'password'], 'required', 'on' => 'login'],
//        ];
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

//应用支持多语言的情况下，可翻译属性标签， 可在 yii\base\Model::attributeLabels() 方法中定义，如下所示:

//    public function attributeLabels()
//    {
//        return [
//            'name' => \Yii::t('app', 'Your name'),
//            'email' => \Yii::t('app', 'Your email address'),
//            'subject' => \Yii::t('app', 'Subject'),
//            'body' => \Yii::t('app', 'Content'),
//        ];
//    }
//scenarios() 方法返回一个数组，数组的键为场景名，值为对应的
//active attributes活动属性。 活动属性可被 块赋值 并遵循验证规则 在上述例子中，username 和 password 在login场景中启用，在 register 场景中, 除了 username and password 外 email 也被启用。
    public function scenarios()
    {
        return [
            'login' => ['username', 'password'],
            'register' => ['username', 'email', 'password'],
        ];
    }

}
