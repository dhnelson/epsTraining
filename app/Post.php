<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'body',
    ];

    protected $table = 'posts';

    public function category() 
    {
    	return $this->belongsTo('App\category');
    }

    public function tags() 
    {
        return $this->BelongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
