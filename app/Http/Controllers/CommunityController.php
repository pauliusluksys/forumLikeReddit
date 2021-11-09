<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{

    public function index()
    {
        $communities = Community::all();
       return view('community.index',['communities' => $communities]);
    }

    public function show(Community $community)
    {
        $id=$community->id;
        $authUser= Auth::user();
//        $isFollowing = $community->members->contains($authUser);
//        dd($isFollowing);

        $community=Community::withCount('posts')->find($id);
        return view('community.show',['community' => $community]);
    }
}
