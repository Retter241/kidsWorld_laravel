<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;
use App\Category as Category;
use App\Comment as Comment;

class Topic extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class , 'author_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
