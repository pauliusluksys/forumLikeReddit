<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Conner\Likeable\Likeable;
class Post extends Model
{
    use HasFactory,SoftDeletes,Likeable;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(PostComment::class)->whereNull('parent_id');
    }
    public function community(){
        return $this->belongsTo(Community::class);
    }
}
