<div class="modal fade" id="unhideModal-{{ $post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id}}" aria-hidden="true" data-id="{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-primary border-2">
      <div class="modal-header border-primary border-2">
        <h5 class="modal-title text-primary" id="unhidegModalLabel-{{ $post->id}}"><i class="fa-solid fa-user-slash"></i> Unhide Post{{$post->id}}</h5>
        
      </div>
      <div class="modal-body">
        <p>Are you sure want to unhide<span>{{$post->id}}</span>? </p>
        <img src="{{$post->image}}" alt="">
        <p class="mt-3">{{$post->description}}</p>
        
      </div>
      <div class="modal-footer border-0">
        <a href="{{route('admin.post.index')}}" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a>
        <form action="{{route('admin.post.restore', $post->id)}}" method="get">
          @csrf
          <button type="submit" class="btn btn-primary">Unhide</button>
        </form>
        
      </div>
    </div>
  </div>
</div>