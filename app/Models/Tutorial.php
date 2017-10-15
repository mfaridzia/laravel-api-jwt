<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'title', 'slug', 'body', 'user_id',
    ];

    public function user() 
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function comments() 
    {
    	return $this->hasMany('App\Models\Comment');
    }

}
