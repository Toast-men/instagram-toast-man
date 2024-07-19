<div class="col-8">
  @foreach ($all_posts as $post)
  <div class="card mb-3">
    <div class="card-header bg-white">
      <div class="row align-items-center">

        <div class="col-auto">
          @if ($post->user->avatar)
          <img src="{{$post->user->avatar}}" alt="#" class="rounded-circle avatar-sm">
          @else
          <i class="fa-solid fa-circle-user icon-sm"></i>
          @endif
        </div>

        <div class="col ps-0">
          <a href="{{route('profile.show', ['id' => $post->user->id])}}" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
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
              @if ($post->user->isFollowed())
              <a class="dropdown-item text-danger" href="{{route('follow.destroy', $post->user->id)}}">Unfollow</a>
              @else
              <a class="dropdown-item" href="{{route('follow.store', $post->user->id)}}">follow</a>
              @endif
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="card-body p-0">
      <a href="{{route('post.show', $post)}}"><img src="{{$post->image}}" alt="" class="w-100"></a>
    </div>

    <div class="card-footer bg-white">
      <div class="">
        <div class="row mt-3 mx-auto align-items-center ">
          <div class="col-auto">
            @if ($post->isLiked($post->id))
            <form action="{{route('like.destroy', $post)}}" method="post">
              @csrf
              @method('DELETE')
              <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
              <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
              <button type="submit" class="btn shadow-none pe-0">
                <i class="fa-solid fa-heart icon-sm text-danger"></i>
              </button>
            </form>
            @else
            <form action="{{route('like.store', $post)}}" method="post">
              @csrf
              <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
              <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
              <button type="submit" class="btn shadow-none">
                <i class="fa-regular fa-heart icon-sm"></i>
              </button>
            </form>
            @endif
          </div>
          <div class="col-auto ps-0">
          <button type="button" class="btn ps-0" data-bs-toggle="modal" data-bs-target="#LikesModal-{{ $post->id}}">
          {{$post->likes->count()}}
              </button>
          </div>
          <div class="col text-end">
            <!-- 関係を2重に使っている -->
            @if (!empty($post->categoryPost))
            <div class="bg-dark badge text-wrap">Uncategorized</>
              @else
              @foreach ($post->categoryPost as $category_post )
              <span class="bg-secondary text-white rounded float-left w-25 text-center px-1">{{$category_post->category->name}}</span>
              @endforeach
              @endif

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

          <hr>

          @forelse ($post->comment->take(3) as $comment)
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

          @if ($post->comment->count() > 3)
          <div class="row mt-2">
            <div class="col">
              <a href="{{route('post.show', $post)}}" class="text-decoration-none">View All {{count($post->comment)}} Comments</a>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    
  </div>
  @include('users.post.modal.delete')
  @include('users.post.modal.likes')

    @endforeach
</div>