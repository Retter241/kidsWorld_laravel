<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\User as User;
use App\Topic as Topic;
use App\Category as Category;
use App\Comment as Comment;


class TestController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

          $posts = Post::with('comments')->with('categories')->with('user')->get();
          $topic = Topic::with('comments')->with('user')->get();
          $posts_from_category = Category::with('posts')->get();
          $category_by_post = Post::with('categories')->with('comments')->get();

          
        dd($topic);

        return view('admin.test');
    }
}
