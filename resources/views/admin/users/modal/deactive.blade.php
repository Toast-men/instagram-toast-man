<div class="modal fade" id="deactiveModal-{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $user->id}}" aria-hidden="true" data-id="{{$user->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-danger border-2">
      <div class="modal-header border-danger border-2">
        <h5 class="modal-title text-danger" id="deactivegModalLabel-{{ $user->id}}"><i class="fa-solid fa-user-slash"></i> Deactive User</h5>
        
      </div>
      <div class="modal-body">
        <p>Are you sure want to deactive <span>{{$user->name}}</span>? </p>
        <img src="{{$user->image}}" alt="">
        <p class="mt-3">{{$user->description}}</p>
        
      </div>
      <div class="modal-footer border-0">
        <a href="{{route('admin.index')}}" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
        <form action="{{route('admin.destroy', $user->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Deactive</button>
        </form>
        
      </div>
    </div>
  </div>
</div>