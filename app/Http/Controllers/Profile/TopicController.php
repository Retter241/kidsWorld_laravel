<?php

namespace App\Http\Controllers\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Topic;
use Auth;
use Hash;


class TopicController extends Controller
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
       //$topics = Topic::with('comments')->with('user')->get();
       $topics = Topic::with('comments')->where('author_id',Auth::user()->id)->get();
        return view('profile.topics.index' , compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('profile.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->alias = $request->alias;
        $topic->author_id = Auth::user()->id;
        $topic->save();
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $topic = Topic::findOrFail($id);
        if($topic->author_id != Auth::user()->id){
            return redirect()->route('topics.index');
        }
        else{
            return view('profile.topics.show',['topic' => $topic]);
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
     
        $topic = Topic::findOrFail($id);
        if($topic->author_id != Auth::user()->id){
            return redirect()->route('topics.index');
        }
        else {
            return view('profile.topics.edit',['topic' => $topic]);
        }
        
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
        //
        $this->validate($request, [
            'title' => 'required',
            'alias' => 'required'
        ]);


        $topic = Topic::find($id);
        $topic->title = $request->input('title');
        $topic->alias = $request->input('alias');
        $topic->save();
         return redirect()->route('topics.index');
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
         $topic = Topic::findOrFail($id); 
       if($topic->author_id != Auth::user()->id){
            return redirect()->route('topics.index');
        }
        $comments = Comment::where('commentable_id', $id)->where('commentable_type' , 'App\Topic')->delete();
        $topic->delete();
        $saveDelete = true;
        if ($saveDelete) {
            return redirect()->route('topics.index');
        }
    }
}
