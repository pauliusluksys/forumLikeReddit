<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSavePostController extends Controller
{
    public function attach(Request $request)
    {
        $user = Auth::user();
        $user->savedPosts()->attach($request->postId);
        return redirect()->back();
    }
    public function detach(Request $request)
    {
        $user = Auth::user();
        $user->savedPosts()->detach($request->postId);
        return redirect()->back();
    }
}
