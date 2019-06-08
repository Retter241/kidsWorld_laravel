<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Category;
use App\Topic;
use App\Post;
use Auth;
use Hash;
use Storage;

class PostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('comments')->with('categories')->with('user')->orderBy('id' , 'DESC')->get();
       // $categories = Category::pluck('title','title')->all();
        return view('admin.posts.index' , compact('posts' /*, 'categories'*/));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'title' => 'required',
            'alias' => 'required',
        ]);

         $image = $request->file('picture');
       
        $post = new Post;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->alias = $request->alias;
        $post->author_id = Auth::user()->id;
        
        if($image){

            $filename = Auth::user()->id . rand(1000, 9999) . $image->getClientOriginalName();
            $image->move(public_path() . '/storage/posts/', $filename);
            

            $post->img =$filename;


          
        }
        $post->save();
        //dd($request->categories);
        $post->categories()->sync($request->categories);




        //$post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        $categories = Category::pluck('title','id')->all();

        $postCategory = $post->categories()->pluck('title','category_id')->all();
        
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
$image = $storagePath;

        return view('admin.posts.edit',compact('categories' , 'post' , 'postCategory' , 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'alias' => 'required',
        ]);

         $image = $request->file('picture');
       
        $post = Post::find($id);
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->alias = $request->alias.'';
        $post->author_id = Auth::user()->id;
        //
       if($image){

            $filename = Auth::user()->id . rand(1000, 9999) . $image->getClientOriginalName();
            $image->move(public_path() . '/storage/posts/', $filename);
            $db_name_string = /*'dashboards/image/' . */$filename;

            $post->img = $db_name_string;


           //$post->img =  Storage::disk('public')->put('/posts',$image);
        }
        
        //dd($request->categories);
        
        if($request->categories){
            $post->categories()->detach();
            $post->categories()->sync($request->categories);
        }
        $post->save();
       return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saveDelete = false;
         $post = Post::findOrFail($id); 
        /*$comments = Comment::where('commentable_id', $id)->where('commentable_type' , 'App\Post')->delete();*/
        $post->categories()->detach();
        $comments = Comment::where('commentable_id', $id)->where('commentable_type' , 'App\Post')->delete();
        $post->delete();
        /*$saveDelete = true;
        if ($saveDelete) {
           
        }*/
         return redirect()->back();
    }
}
