@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="container" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
  <div class="row">
    <div class="col-8 p-0  border">
      <img src="{{$post->image}}" alt="" class="p-0 w-100">
    </div>
    <div class="col-4 p-0 border">
      <div class="card rounded-0 p-0 border-0">
        <div class="card-header bg-white">
          <div class="row align-items-center">
            <div class="col-auto">
              @if ($post->user->avatar)
              <img src="#" alt="#" class="rounded-circle avatar-sm">
              @else
              <i class="fa-solid fa-circle-user icon-sm"></i>
              @endif
            </div>
            <div class="col ps-0">
              <a href="#" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
            </div>
            <div class="col-auto">
              <div class="dropdown">
                <button class="btn btn-sm shadown-none" data-bs-toggle="dropdown">
                  <i class="fa-solid fa-ellipsis"></i>
                </button>
                @if (Auth::user()->id == $post->user->id)
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('post.edit', $post)}}">Edit</a>
                  <button type="button" class="btn dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deletePostModal-{{ $post->id}}">
                    Delete
                  </button>

                </div>


                @else
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Unfollow</a>
                </div>
                @endif

              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="">


            <div class="row mt-3 mx-auto ">
              <div class="col">
                <form action="" method="post">
                  @csrf
                  <button type="submit" class="btn shadow-none">
                    <i class="fa-regular fa-heart icon-sm"></i>
                  </button>
                </form>
                <span class="ms-3">0</span></i>
              </div>
              <div class="col text-end">
                <!-- 関係を2重に使っている -->
                @foreach ($post->categoryPost as $category_post )
                <span class="bg-secondary text-white rounded float-left w-25 text-center px-1">{{$category_post->category->name}}</span>
                @endforeach
              </div>

            </div>
            <div class="row mt-3 mx-auto">
              <div class="col">

              </div>
            </div>

            <div class="row mx-auto">
              <div class="col">
                <p class="h5 fw-bold me-5">{{$post->user->findorFail($post->user_id)->name}}<span class="h5 fw-bold ms-3">{{$post->description}}</span></p>

              </div>

            </div>
            <div class="row mx-auto">
              <div class="col">
                <p class="h5 text-small">{{$post->created_at->format('F j Y')}}</p>
              </div>

            </div>

            <div class="row my-4 mx-auto">
              <form action="{{route('comment.store', $post)}}" method="post">
                @csrf
                <div class="input-group">
                  <input type="text" name="comment" id="comment" class=" form-control" placeholder="Add a comment...">
                  <input type="hidden" name="post_id" id="post_id" class="form-control" value="{{$post->id}}">
                  <div class="input-group-prepend">
                    <button type="submit" class="input-group-text">Post</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="row bg-light">
              @forelse ($post->comment as $comment)
              <div class="row">
                <p class="fw-bold h5">{{$comment->user->name}}<span class="fw-normal ms-3">{{$comment->body}}</span></p>
              </div>
              <div class="row">
                <form action="{{route('comment.destroy', $comment)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <span class="text-small">{{$comment->created_at->format('F j Y')}} &middot;
                    <button type="submit" class="btn shadow-none text-danger text-decoration-none">Delete</button>
                  </span>
                </form>
              </div>
              @empty
              @endforelse
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('users.post.modal.delete')
@endsection