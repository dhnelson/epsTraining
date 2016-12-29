<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    public function post() 
    {
    	return $this->belongsTo('App\Post');
    }

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Use a custom collection for all comments.
     *
     * @param  array  $models
     * @return CustomCollection
     */
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
