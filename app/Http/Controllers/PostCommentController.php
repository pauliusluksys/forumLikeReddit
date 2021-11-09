<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Post;
class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        PostComment::create($input);

        return back();
    }
}
