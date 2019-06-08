<?php

use Illuminate\Database\Seeder;

class CommentsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for ($i=0; $i < 5; $i++) { 
			DB::table('comments')->insert([
            'user_id' => 1+$i,
            'body' => str_random(15),
            'commentable_id' => 2+$i,
            'commentable_type' => 'App\Post',
           
        ]);
		 }

		 for ($i=0; $i < 5; $i++) { 
			DB::table('comments')->insert([
            'user_id' => 1+$i,
            'body' => str_random(15),
            'commentable_id' => 2+$i,
            'commentable_type' => 'App\Topic',
           
        ]);
		 }
    }
}
