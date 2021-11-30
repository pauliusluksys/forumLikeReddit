<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityMember;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserSavePostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostCommentController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicefvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/user_save_post/detach',[UserSavePostController::class,'detach'])->name('userSavePost.detach');
Route::post('/user_save_post/attach',[UserSavePostController::class,'attach'])->name('userSavePost.attach');
route::post('/community_member',[CommunityMember::class,'store'])->name('communityMember.destroy');
route::delete('/community_member',[CommunityMember::class,'delete'])->name('communityMember.store');
route::get('communities',[CommunityController::class,'index'])->name('community.index');
route::get('community/{community}',[CommunityController::class,'show'])->name('community.show');
Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('auth/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/auth/github/callback', [LoginController::class, 'handleGithubCallback']);


Route::get('/test/new-user',[TestController::class,'create'])->name('new-user');


Route::get('/',[\App\Http\Controllers\PostController::class,'index'])->name('post.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/community/{community}/post/new', [PostController::class, 'create'])->name('post.create');
Route::post('/community/post/new', [PostController::class, 'store'])->name('post.store');
Route::post('/post-comment/store', [PostCommentController::class, 'store'])->name('post-comment.add');
Route::post('/post/like',[PostController::class,'postLike'])->middleware('auth')->name('post.like');
Route::post('/post/unlike',[PostController::class,'postUnlike'])->middleware('auth')->name('post.unlike');

Route::get('/about-us', function () {
    return Inertia::render('About', ['about_us' => 'working']);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users/{user}', [UserDataController::class, 'show'])->name('user.show');
Route::get('/users/{user}', [UserDataController::class, 'show'])->name('user.');

Route::get('/test/script/javascript',function(){
    return view('/test/script/javascript');


});

Route::get('/test',[TestController::class,'index'])->name('test.index');
Route::get('/table',[TableController::class,'index'])->name('table.index');
Route::patch('test/{user}/update',[TestController::class,'update'])->name('test.update');
Route::delete('test/{user}',[TestController::class,'destroy'])->name('test.delete');
Route::get('/test/{user}/edit',[TestController::class,'edit'])->name('test.edit');
Route::get('/test/new-user',[TestController::class,'create'])->name('new-user');
Route::post('/test/new-user',[TestController::class,'store'])->name('test.store');


Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);


Route::inertia('/about', 'AboutComponent');
require __DIR__.'/auth.php';
