<?php

use Illuminate\Database\Seeder;

class TopicsTableSeed extends Seeder
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
			DB::table('topics')->insert([
            'title' => 'Topic - '.$i.str_random(3),
            'img' => str_random(7),
            'alias' => str_random(15),
            'author_id' => 1,
            'created_at' => now(),
        ]);
		 }
    }
}
