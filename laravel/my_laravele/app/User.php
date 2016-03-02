<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'pwd',
    ];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array 屏蔽字段隐藏字段
     */
    protected $hidden = [
        //'password'
    ];

    protected $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function userTest()
    {
        return $this->all();
        //return $this->find(3);
        //return $this->where('name','lcc')->get();
        //return $this->where('age', '>', '1')->get();
    }

    //关闭开始时间 创建时间
    public $timestamps = false;

    //增加
    public function userAdd()
    {
        $this->name = 'lcc';
        $this->age = 40;
        $this->save();
    }

    //修改
    public function userUpdate()
    {
        $user = $this->find(1);
        $user->name = "lc";
        $user->save();
    }

    //删除
    public function userDelete(){
        $user=$this->find(1);
        $user->delete();
    }


}
