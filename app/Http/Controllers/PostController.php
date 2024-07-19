<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('users.post.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = auth()->user()->id;
        $this->post->description = $request->description;
        $this->post->image =  'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
        $this->post->save();

        // social array への変換 recoding, re writhing the index array turning it into associative array
        $category_post = [];
        foreach($request->categories as $category_id):
            // "category_id"はcategory_postのcategory_id
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $this->post->categoryPost()->createMany($category_post);

        return redirect()->route('index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        // $all_comments = $post->comment->all();
        return view('users.post.show')
        ->with('post', $post)
        ;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('users.post.edit')->with('post', $post)
        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->description = $request->description;
        if(!empty($request->image)){
            $post->image =  'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
        }
        
        $post->save();

        $post->categoryPost()->delete();

        if(!empty($request->categories)){
            $category_post = [];
        foreach($request->categories as $category_id):
            // "category_id"はcategory_postのcategory_id
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $post->categoryPost()->createMany($category_post);
        }

        
        
        // 以下の書き方で$postをそのまま渡せる
        return redirect()->route('post.show', $post);
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('index');
    }
}
