<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommunityMember extends Controller
{
    public function store(Request $request)
    {
        Auth::user()->communities()->attach($request->communityId,['is_blocked' => false]);
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        $authUser = Auth::user();
        $authUser->communities()->detach($request->communityId);
        return redirect()->back();
    }

}
