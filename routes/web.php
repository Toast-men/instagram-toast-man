<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Adminmiddleware;

Auth::routes();


Route::group(["middleware" => "auth"], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::resource('/post', PostController::class);
    Route::resource('/comment', CommentController::class);
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/follower', [ProfileController::class, 'followers'])->name('profile.follower');
    Route::get('profile/{id}/following', [ProfileController::class, 'followings'])->name('profile.following');
    

    Route::post('{post}/like', [LikeController::class, 'store'])->name('like.store');
    Route::delete('{post}/dislike', [LikeController::class, 'destroy'])->name('like.destroy');

    Route::get('follow/{id}' ,[FollowController::class, 'store'])->name('follow.store');
    Route::get('unfollow/{id}' ,[FollowController::class, 'destroy'])->name('follow.destroy');
    

    

    Route::get('admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::delete('admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
    Route::patch('admin/categories/{id}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::post('admin/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');

    Route::get('users/serch', [HomeController::class, 'serchUsers'])->name('search.users');
    Route::get('suggestions', [HomeController::class, 'allS uggestedUsers'])->name('suggestions');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        //User
        Route::get('users', [UsersController::class, 'index'])->name('index');
        Route::delete('users/{id}', [UsersController::class, 'destroy'])->name('destroy');
        Route::get('users/{id}/restore', [UsersController::class, 'restore'])->name('restore');

        // Post
        Route::get('posts', [ PostsController::class, 'index'])->name('post.index');
        Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
        Route::get('posts/{id}/restore', [PostsController::class, 'restore'])->name('post.restore');

        // categories
        Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
        Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        Route::patch('categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
        Route::post('categories/store', [CategoriesController::class, 'store'])->name('categories.store');
    });

});

