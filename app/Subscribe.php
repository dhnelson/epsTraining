<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribes'; // tells laravel that catagory model is connected to categories table 

    protected $fillable = [
        'email',
    ];
}
