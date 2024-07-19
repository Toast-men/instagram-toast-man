<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    // function isFollowed($post_user){
    //     $isFollowed = Follow::where('follower_id', auth()->user()->id)
    //     ->where('following_id', $post_user)->exists(); 

    //     return $isFollowed;
    // }

    public function followers(){
        // user_idが2つのフォーリンkeyと繋がっているので、指定する
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function followings(){
        // user_idが2つのフォーリンkeyと繋がっているので、指定する
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function isFollowed(){
        return $this->followers()->where(['follower_id' => auth()->user()->id])->exists();
    }

    // public function isActive($id){
    //     $user = $this->user->findOrFail($id);
    //     if($user->delted_at){
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }

    }


