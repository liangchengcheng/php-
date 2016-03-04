<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * 这个就是数据库的表名
     */
    protected $table='member';

    /**
     * id
     */
    protected $primaryKey="id";
}
