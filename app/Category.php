<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post as Post;

//https://appdividend.com/2018/05/17/laravel-many-to-many-relationship-example/#Step_2_Create_a_model_and_migration

//https://appdividend.com/2018/05/17/laravel-many-to-many-relationship-example/#Step_2_Create_a_model_and_migration

class Category extends Model
{
     protected $fillable = [
        'title', 'parent_id', 'alias',  
    ];


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}




 