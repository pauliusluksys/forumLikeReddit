<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\User;
use PhpParser\Comment;
use Stevebauman\Location\Facades\Location;

class UserDataController extends Controller
{
    public function index()
    {
        $usersList = User::orderBy('id', 'desc')
            ->paginate(6);

        return Inertia::render('UserView', [
            'usersList' => $usersList
        ]);
    }

    public function show(User $user){

//        $user->addMedia($pathToFile)
//            ->toMediaCollection();
        $userId = $user->id;
        $posts = Post::where('user_id', $userId)
            ->addSelect(['body' => PostComment::select('body')
            ->whereColumn('post_id','posts.id')
            ->orderByDesc('updated_at')
            ->limit(1)
            ])->get();
//        $comment = PostComment::where('user_id',$userId)->get()->toArray();
//        $posts = Post::where('user_id',$userId)->get()->toArray();
//        $posts2 = Post::where('user_id',$userId)->get()->toJson(JSON_PRETTY_PRINT);
//        dd($comment,$posts);
//        I have posts with date.
//        I have comments with date which are related to a post.
//        I need to compare comments date with posts date and order
        $posts = Post::where('user_id',$userId)
            ->orWhereHas('comments', function ($query) use ($userId) {
                $query->where('user_id',$userId);
            })->paginate(7);
        $savedPosts = User::find($user->id)->savedPosts()->pluck('id')->toArray();
        $ip = '162.159.24.227'; /* Static IP address */
        $currentUserInfo = Location::get();
        return view('user.profile', ['user' => $user,'posts' => $posts,'currentUserInfo' => $currentUserInfo,'savedPosts' => $savedPosts]);

    }

}
