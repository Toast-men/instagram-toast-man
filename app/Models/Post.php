<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed(  );
    }   

    public function comment(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    function isLiked($post_id){
        $existingLike = Like::where('user_id', auth()->user()->id)
        ->where('post_id', $post_id)->exists(); 

        return $existingLike;

    }
}
