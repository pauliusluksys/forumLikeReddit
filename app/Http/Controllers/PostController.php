<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(15);
        $communities = Community::take(10)->get();

        return view('Post.index', ['communities' => $communities,'posts' => $posts]);
    }
    public function show(Post $post){
        return view('Post.show', ['post' => $post]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('it works');
//        Post::create($request->all());
//        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->has('id')) {
            Post::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Post::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }

    public function postLike(Request $request){

        $post = Post::findorfail($request->post_id);
        $post->like(Auth::id());
        return redirect()->back();
    }
    public function postUnlike(Request $request){
        $post = Post::findorfail($request->post_id);
        $post->unlike(Auth::id());
        return redirect()->back();

    }
    public function comments()
    {
        return $this->hasMany(PostComment::class)->whereNull('parent_id');
    }
}

