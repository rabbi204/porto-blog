<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user(){
        return $this ->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this -> belongsToMany('App\Models\Category');
    }


    public function tags()
    {
        return $this -> belongsToMany('App\Models\Tag');
    }

    /**
     * get all Comments
     */
    public function comments()
    {
        return $this -> hasMany('App\Models\Comment');
    }


}
