<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;
use App\Category as Category;
use App\Comment as Comment;


class Post extends Model
{
    //

     protected $fillable = [
        'title', 'desc', 'content',  'alias','img','author_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
