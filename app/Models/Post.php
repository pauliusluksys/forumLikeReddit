<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Conner\Likeable\Likeable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,Likeable,InteractsWithMedia;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function savedByUser()
    {
        return $this->belongsToMany(User::class,'user_saved_post');
    }
    public function comments()
    {
        return $this->hasMany(PostComment::class)->whereNull('parent_id');
    }
    public function community(){
        return $this->belongsTo(Community::class);
    }
}
