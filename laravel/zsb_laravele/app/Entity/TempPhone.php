<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class TempPhone extends Model
{
    //短信验证相关
    protected $table = 'temp_phone';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
