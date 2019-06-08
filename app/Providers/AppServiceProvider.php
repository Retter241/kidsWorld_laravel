<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Post;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         Schema::defaultStringLength(191);

         $posts_sidebar = Post::inRandomOrder('id')->take(5)->get();
         View::share('posts_sidebar' ,$posts_sidebar);

         $categories_menu = Category::all();
         View::share('categories_menu' ,$categories_menu);
    }
}
