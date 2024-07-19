<div class="modal fade" id="LikesModal-{{ $post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id}}" aria-hidden="true" data-id="{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content  border-2">
      <div class="modal-header  border-2">
        <h5 class="modal-title  " id="LikesgModalLabel-{{ $post->id}}"><i class="fa-solid fa-heart text-danger"></i> Likes Users</h5>

      </div>
      <div class="modal-body">
        @forelse ($post->likes as $like)
        <div class="row align-items-center mt-3">
          <div class="col-auto d-flex align-items-center">
            @if ($like->user->avatar)
            <img src="{{ $like->user->avatar }}" alt="" class="rounded-circle avatar-md">

            @else
            <i class="fa-solid fa-circle-user icon-md"></i>

            @endif
          </div>
          <div class="col-auto">
            <a href="{{ route('profile.show', $like->user->id) }}" class="text-decoration-none text-dark">{{ $like->user->name }}<br>
              {{$like->user->email}}</a>

        </div>
      </div>
      @empty
        <h3>No likes yet</h3>
      @endforelse

    </div>

  </div>
</div>
</div>