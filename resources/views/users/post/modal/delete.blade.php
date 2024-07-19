<div class="modal fade" id="deletePostModal-{{ $post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id}}" aria-hidden="true" data-id="{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-danger border-2">
      <div class="modal-header border-danger border-2">
        <h5 class="modal-title text-danger" id="deletePostgModalLabel-{{ $post->id}}"><i class="fa-solid fa-circle-exclamation"></i> Delete Post</h5>
        
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this post?</p>
        <img src="{{$post->image}}" alt="">
        <p class="mt-3">{{$post->description}}</p>
        
      </div>
      <div class="modal-footer border-0">
        <a href="{{route('index')}}" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
        <form action="{{route('post.destroy', $post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>