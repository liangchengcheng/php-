<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/4/14
 * Time: 下午9:19
 */

在laravel中使用时间戳
class YourModel extends  Eloquent{
    public $timestamps=false;

    public static function boot(){
        parent::boot();
        static::creating(function($model) {
            $dt = new DateTime;
            $model->created_at = $dt->format('m-d-y H:i:s');
            return true;
        });

        static::updating(function($model) {
            $dt = new DateTime;
            $model->updated_at = $dt->format('m-d-y H:i:s');
            return true;
        });
    }
}