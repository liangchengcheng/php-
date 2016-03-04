<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PdtImages extends Model
{
    /**
     * 这个就是数据库的表名
     */
    protected $table='pdt_images';

    /**
     * id
     */
    protected $primaryKey="id";
}
