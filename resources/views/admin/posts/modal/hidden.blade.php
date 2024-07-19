<div class="modal fade" id="hiddenModal-{{ $post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id}}" aria-hidden="true" data-id="{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-danger border-2">
      <div class="modal-header border-danger border-2">
        <h5 class="modal-title text-danger" id="hiddengModalLabel-{{ $post->id}}"><i class="fa-solid fa-user-slash"></i> Hidden Post{{$post->id}}</h5>
        
      </div>
      <div class="modal-body">
        <p>Are you sure want to hide<span>{{$post->id}}</span>? </p>
        <img src="{{$post->image}}" alt="">
        <p class="mt-3">{{$post->description}}</p>
        
      </div>
      <div class="modal-footer border-0">
        <a href="{{route('admin.post.index')}}" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
        <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hidden</button>
        </form>
        
      </div>
    </div>
  </div>
</div>