<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post() 
    {
    	return $this->belongsTo('App\Post');
    }

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
