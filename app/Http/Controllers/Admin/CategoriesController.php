<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;

use function PHPUnit\Framework\isEmpty;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        $all_posts = Post::all();
        // $uncategorized_posts = Post::doesntHave('categoryPost')->count();
        $uncategorized_posts = 0;
        foreach ($all_posts as $post){
            if($post->categoryPost->count() === 0){
                $uncategorized_posts++;
                
            }
        }


        

        
        return view('admin.categories.index')
        ->with('categories', $categories)
        ->with('uncategorized_posts', $uncategorized_posts);
        


    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function update($id, Request $request){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index');
    }
}
