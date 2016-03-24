<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //产品列表
    protected $table = 'category';
    protected $primaryKey = 'id';

    //public $timestamps = false;
}
