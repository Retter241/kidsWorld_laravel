<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(UsersTableSeed::class);
         
         $this->call(CategoriesTableSeed::class);
         $this->call(PostsTableSeed::class);

         
         $this->call(TopicsTableSeed::class);
         $this->call(CommentsTableSeed::class);
    }

    //php artisan db:seed

	//php artisan db:seed --class=UsersTableSeeder
    //php artisan migrate:refresh --seed
}
