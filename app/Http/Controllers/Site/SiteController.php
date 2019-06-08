<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\User;
use App\Topic;
use App\Comment;
use Auth;
use Illuminate\Support\Facades\Redirect;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::OrderBy('id', 'desc')->paginate(5);
        //$posts = Post::take(5)->get();
        return view('site.welcome' , ['posts' => $posts]);
    }




    public function showCategoryPage(Request $request)
    {
        $posts = array();
        $page_title = '';
       

        //$param = (array)$request->route()->parameters();
        $param = $request->route()->parameters();

       // dd($param['category1']);
        //просто новость
        if(array_key_exists('news_id' , $param)){
             
            $posts = Post::with('categories')->with('comments')->where('alias' , $param['news_id'])->get();
            return view('site.news' , ['posts' => $posts]);
        }
        //первая часть
        if(array_key_exists('category1' , $param) and !array_key_exists('category2' , $param)){
            
            if($this->checkType($param['category1']) == 'Category'){
                $posts = Post::with('categories')
                    ->whereHas('categories', function($q)  use ($param) {
                        $q->where('categories.alias', '=', $param['category1']);
                    })->with('comments')->get();
                $cat_name = Category::where('alias',$param['category1'])->get();
                $page_title = $cat_name;

                return view('site.category' , ['posts' => $posts , 'page_title'=>$page_title]);
               
            }
            if($this->checkType($param['category1']) == 'Post'){
                $posts = Post::with('categories')->with('comments')->where('alias' , $param['category1'])->get();
                return view('site.news' , ['posts' => $posts]);
            }

        }

        //вторая часть
        if(array_key_exists('category1' , $param) and array_key_exists('category2' , $param)){

           // dd($this->checkType($param['category2']));
            //dd($this->checkType($param['category2']));
            if($this->checkType($param['category2']) == 'Category'){
            	//dd($param['category2']);
                $posts =Post::whereHas('categories', function($q)  use ($param) {
                    $q->where('categories.alias', '=', $param['category2']);
                })->with('comments')->get();

                $posts =Post::whereHas('categories', function($q)  use ($param) {
                    $q->where('categories.alias', '=', $param['category1']);
                })->whereHas('categories', function($q)  use ($param) {
                    $q->where('categories.alias', '=', $param['category2']);
                })
                ->with('comments')->with('user')->get();


                   return view('site.subcategory' , ['posts' => $posts]);
        
            }
            if($this->checkType($param['category2']) == 'Post'){
                $posts = Post::with('categories')->with('comments')->where('alias' , $param['category2'])->get();
                return view('site.news' , ['posts' => $posts]);
            }

        }
    }

    /*
     * @param - url part
     *
     * @return type of model
     */
    public function checkType ($param) {

        if(count(Category::where('alias' , $param)->get('id')) > 0){
            return 'Category';
        }
        return 'Post';
    }


    public function addCommentTopic (Request $request)
    {
        if(isset($request)){
            $comment = new Comment;
            $comment->body = $request->get('comment_body');
            $comment->user()->associate(Auth::user()->id);
            $topic = Topic::find($request->post_id);

            $topic->comments()->save($comment);
            //return $comment;

            return back();
            //return redirect()->route('post.show' , $request->post_id);
        }
        return redirect()->back();
    }

    public function addCommentPost (Request $request)
    {
        if(isset($request)){
            $comment = new Comment;
            $comment->body = $request->get('comment_body');
            $comment->user()->associate(Auth::user()->id);
            $post = Post::find($request->post_id);

            $post->comments()->save($comment);
            //return $comment;

            return back();
            //return redirect()->route('post.show' , $request->post_id);
        }
        return redirect()->back();
    }



    /**
     * Show the forum page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showForumPage()
    {
        $topics = Topic::with('comments')->with('user')->orderBy('id', 'desc')->paginate(5);
        return view('site.forum' , ['topics' => $topics]);
    }

    /**
     * Show the forum topic page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showForumTopicPage($alias , Request $request)
    {
        $topic = Topic::where('alias' , $alias)->with('user')->with('comments')->get();
        return view('site.topic' , ['topic'=> $topic]);
    }

    public function addTopic (Request $request)
    {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->alias = $request->alias;
        $topic->author_id = Auth::user()->id;
        $topic->save();
        return redirect()->back();
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAboutPage()
    {
        return view('site.about');
    }

    /**
     * Show the roditeliam page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRoditeliamPage()
    {
        return view('site.roditeliam');
    }

    /**
     * Show the roditeliam page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDomashnieJivotniePage()
    {
        return view('site.domashniejivotnie');
    }
}
