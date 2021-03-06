<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'image'];

    /**
     * The attributes excluded from the model's JSON form.
     * 在形成json的时候不要包含
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * One to one relation
     */
    public function userRoles()
    {
        return $this->hasOne('App\UserRoles', 'user_id', 'id');
    }

}
