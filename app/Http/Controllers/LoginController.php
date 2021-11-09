<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
        $user = Socialite::driver('github')->user();
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email','=',$data->email)->first();
        if(!$user) {
            $user = new User();
            $user->name =$data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar =$data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

//    public function loginWithFacebook()
//    {
//        try {
//
//            $user = Socialite::driver('facebook')->user();
//            $isUser = User::where('facebook_id', $user->id)->first();
//
//            if($isUser){
//                Auth::login($isUser);
//                return redirect('/dashboard');
//            }else{
//                $createUser = User::create([
//                    'name' => $user->name,
//                    'email' => $user->email,
//                    'fb_id' => $user->id,
//                    'password' => encrypt('admin@123')
//                ]);
//
//                Auth::login($createUser);
//                return redirect('/dashboard');
//            }
//
//        } catch (Exception $exception) {
//            dd($exception->getMessage());
//        }
//
//    }

}
