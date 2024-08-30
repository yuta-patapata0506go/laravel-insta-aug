<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory,SoftDeletes;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category_post(){
        return $this->hasMany(CategoryPost::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function isliked(){
        return $this->likes()->where('user_id',auth()->user()->id)->exists();
    }

    

}
