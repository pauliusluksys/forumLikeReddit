<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','description',
    ];

    public function communityCategory()
    {
        return $this->belongsTo(CommunityCategory::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function members()
    {
        return $this->belongsToMany(User::class,'community_member');
    }
//    public function rules(){
//        return $this->belongsToMany(CommunityRule::class);
//    }

}
