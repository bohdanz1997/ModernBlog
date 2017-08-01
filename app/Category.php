<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getPostsAsArray()
    {
        return $this->posts()->pluck('name', 'id')->toArray();
    }
}
