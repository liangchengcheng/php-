<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable.
     * 这是不可忽视的属性
     * @var array
     */
    protected $fillable = ['title', 'image', 'date', 'visible'];

    /**
     * One to many relation
     * 一对多的关系
     */
    public function galleryImages()
    {
        return $this->hasMany('App\GalleryImages', 'gallery_id', 'id');
    }
}
