<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PdtContent extends Model
{
    /**
     * 这个就是数据库的表名
     */
    protected $table='pdt_content';

    /**
     * id
     */
    protected $primaryKey="id";
}
