<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $all_posts = $this->filterPost();
        $suggested_users = $this->suggestedUsers();
        // $suggested_users = User::whereNotIn('id', $following_users)->where('id', '!=', $user->id)->get();
        return view('users.home.home')
            ->with('all_posts', $all_posts)
            ->with('suggested_users', $suggested_users);
    }

    public function suggestedUsers()
    {
        //get all users except for current user


        $all_users = User::all()->except(Auth::id());
        $suggested_users = [];
        foreach ($all_users as $user) :
            if (!$user->isFollowed())
                $suggested_users[] = $user;
        endforeach;

        return $suggested_users;
    }

    public function filterPost()
    {
        // $user = Auth::user();
        // $following_users = $user->followings->following;
        // $all_users = User::all()->except($this->suggestedUsers());
        // $myuser = Auth::user();
        // $all_users = User::all();

        // foreach($all_users as $user):
        //     if($user->isFollowed() || $user == auth()->user())
        //     $all_posts[] = $user->post;
        // endforeach;
        // return $all_posts;

        $all_posts = Post::all();
        $filtered_posts = [];

        foreach ($all_posts as $post) :
            if ($post->user == auth()->user() || $post->user->isFollowed())
                $filtered_posts[] = $post;
        endforeach;

        return $filtered_posts;
    }

    public function serchUsers(Request $request){
        $users = User::where('name', 'like', '%'.$request->keyword.'%')->get();
        return view('users.search.users')
        ->with('users', $users)
        ->with('keyword', $request->keyword);
    }

    public function allSuggestedUsers()
    {
        //get all users except for current user


        $all_users = User::all()->except(Auth::id());
        $suggested_users = [];
        foreach ($all_users as $user) :
            if (!$user->isFollowed())
                $suggested_users[] = $user;
        endforeach;

        return view('users.home.suggestions')->with('suggested_users', $suggested_users);
    }
}
