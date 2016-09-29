<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // tells laravel that catagory model is connected to categories table 

    protected $fillable = [
        'name',
    ];

    public function posts() 
    {

    	return $this->hasMany('App\Post');

    }
}
