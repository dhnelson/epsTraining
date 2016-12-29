<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function category() 
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags() 
    {
        return $this->BelongsToMany('App\Tag');
    }

    /**
     * A post can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Load a threaded set of comments for the post.
     *
     * @return App\CommentsCollection
     */
    public function getThreadedComments()
    {
        return $this->comments()->get()->threaded();
    }
}
