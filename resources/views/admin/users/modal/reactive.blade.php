<div class="modal fade" id="reactiveModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $user->id}}" aria-hidden="true" data-id="{{$user->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-success border-2">
      <div class="modal-header border-success border-2">
        <h5 class="modal-title text-success" id="reactivegModalLabel-{{ $user->id}}"><i class="fa-solid fa-user-slash"></i> Reactive User</h5>
        
      </div>
      <div class="modal-body">
        <p>Are you sure want to reactive <span>{{$user->name}}</span>? </p>
        <img src="{{$user->image}}" alt="">
        <p class="mt-3">{{$user->description}}</p>
        
      </div>    
      <div class="modal-footer border-0">
        <a href="{{route('admin.index')}}" class="btn btn-outline-success" data-dismiss="modal">Cancel</a>
        <form action="{{route('admin.restore', $user->id)}}" method="get">
          @csrf
          <button type="submit" class="btn btn-success">Reactive</button>
        </form>
        
      </div>
    </div>
  </div>
</div>