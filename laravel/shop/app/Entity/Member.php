<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //会员信息
    protected $table = 'member';
    protected $primaryKey = 'id';

    //public $timestamps = false;
}
