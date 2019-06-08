<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

//https://www.itsolutionstuff.com/post/laravel-many-to-many-polymorphic-relationship-tutorialexample.html

class Comment extends Model
{
    protected $fillable = [
        
	'user_id','body','commentable_id','commentable_type',

    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
