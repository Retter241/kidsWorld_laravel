<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

	


    return [
        //


        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        } ,
        'body' => $faker->unique()->safeEmail,
        'commentable_id' => 1,
        'commentable_type' => 'App\Post',
        'created_at' => now(),
    ];
});

