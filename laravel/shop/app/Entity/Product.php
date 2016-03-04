<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 这个就是数据库的表名
     */
    protected $table='product';

    /**
     * id
     */
    protected $primaryKey="id";
}
