<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags'; // tells laravel that catagory model is connected to categories table 

    protected $fillable = [
        'name',
    ];

    public function posts() 
    {

    	return $this->BelongsToMany('App\Post');

    }
}
