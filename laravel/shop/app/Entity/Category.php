<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 这个就是数据库的表名
     */
    protected $table='category';

    /**
     * id
     */
    protected $primaryKey="id";
}
