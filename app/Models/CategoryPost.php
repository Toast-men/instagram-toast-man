<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    // how to connect to categorypost manually
    protected $table = 'category_post';
    // fillable はarrayから値を入れることができる

    protected $fillable = ['category_id', 'post_id'];

    public $timestamps =false;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
