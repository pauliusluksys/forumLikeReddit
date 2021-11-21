<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
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
        $userId = Auth::id();
        $savedPosts = User::find($userId)->savedPosts()->pluck('id')->toArray();
//        dd($savedPosts);
        return view('Post.index', ['communities' => $communities,'posts' => $posts,'savedPosts' => $savedPosts]);
    }
    public function show(Post $post){
//        $mediaItems = $post->getMedia('images');
//        $publicUrl = $mediaItems[0]->getUrl();

        //dd($post->getFirstMediaUrl('images'));
        return view('Post.show', ['post' => $post]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Community $community)
    {
        return view('Post.create',['community' => $community]);
    }
    public function store(Request $request)
    {
        $content = $request->input('summary-ckeditor');
//        dd($content);

            $body_content = trim($content);
            $body_content = stripslashes($body_content);
            $body_content = htmlspecialchars($body_content);
            return $body_content;
        }
//        $post = New Post;
//        $post->title = $request->title;
//        $post->slug = \Str::slug($request->title);
//        $post->body = $request->body;
//        $post->is_draft = 0;
//        $post->community_id = 3;
//        $post->user_id = 1;
//        $post->save();
//        if($request->hasFile('image') && $request->file('image')->isValid()){
//            $post->addMediaFromRequest('image')->toMediaCollection('images');
//        }
//        return redirect()->route('user.show',['user' => Auth::id()])->with('success', 'New Gift Added !');
//    }


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

