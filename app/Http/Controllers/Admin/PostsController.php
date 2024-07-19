<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    //
    public function index(){
        // $users = User::withTrashed()->get();
        $all_posts = Post::withTrashed()->paginate(1);
        return view('admin.posts.index')
        ->with('all_posts', $all_posts);
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function restore($id) {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }
}
