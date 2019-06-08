<?php

use Illuminate\Database\Seeder;

class PostsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
for ($i=0; $i < 15; $i++) { 
	  DB::table('posts')->insert([
            'title'=>'Новость № '.str_random(1),
            /*'cat_parent_id'=>2+$i,
            'cat_child_id'=>2+$i-1,*/
            'desc'=>str_random(35),
            'content'=>str_random(50),
            'alias'=>'news-'.str_random(5),
            'img'=>null,
            'author_id'=>1,
            'created_at' => now(),
        ]);
}
      
    }
}


      