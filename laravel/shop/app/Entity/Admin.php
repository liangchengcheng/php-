<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin 后台会员管理的类
 * @package App
 */
class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
}
