<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{

    public function index()
    {
        $communities = Community::all();
        $userId = Auth::id();
        $savedPosts = User::find($userId)->savedPosts()->pluck('id')->toArray();
       return view('community.index',['communities' => $communities]);
    }

    public function show(Community $community)
    {
        $id=$community->id;
        $authUser= Auth::user();
        $communities = Community::where('community_category_id',$community->community_category_id)->get();
        $community = Community::withCount('posts')->find($id);
        $community->setRelation('posts',$community->posts()->paginate(3));
        $userId = Auth::id();
        $savedPosts = User::find($userId)->savedPosts()->pluck('id')->toArray();
        return view('community.show',['communities' => $communities, 'community' => $community,'savedPosts' => $savedPosts]);
    }
}
