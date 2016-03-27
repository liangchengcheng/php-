<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * 基本的会员的注册信息对应 的类
 * Class Member
 * @package App\Entity
 */
class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'qid';
}
