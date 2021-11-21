<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
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


        $posts=$user->posts()->paginate(7);
        $ip = '162.159.24.227'; /* Static IP address */
        $currentUserInfo = Location::get();
        return view('user.profile', ['user' => $user,'posts' => $posts,'currentUserInfo' => $currentUserInfo]);

    }

}
