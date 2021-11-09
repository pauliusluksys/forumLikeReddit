<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function communities()
    {
        return $this->hasMany(Community::class);
    }
}
