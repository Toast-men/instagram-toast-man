<div class="col-4">



  <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
    <div class="col-auto">
      @if (Auth::user()->avatar)
      <a href="{{route('profile.show', Auth::id())}}">
        <img src="{{Auth::user()->avatar}}" alt="" class="rounded-circle avatar-md">
      </a>

      @else
      <a href="{{route('profile.show', Auth::id())}}">
        <i class="fa-solid fa-circle-user icon-md text-secondary"></i>
      </a>

      @endif
    </div>

    <div class="col">
      <a href="{{route('profile.show', Auth::id())}}" class="text-decoration-none text-dark fw-bold text-truncate">{{Auth::user()->name}}</a>
      
      <p class="text-muted mb-0">{{Auth::user()->email}}</p>
    </div>

  </div>




  <div class="container my-5">

    <div class="row">

      <div class="col-auto">
        <p class="h5 text-capitalize">Suggestions for you</p>
      </div>

      <div class="col text-end ">
        <a href="{{route('suggestions')}}" class="text-decoration-none text-black">See All</a>
      </div>

    </div>

    <div>
      @foreach (collect($suggested_users)->take(10) as $user)
      <div class="row align-items-center mt-3">
        <div class="col d-flex align-items-center">
          @if ($user->avatar)
          <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-sm">
          <span class="ms-3 h5">
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark">{{ $user->name }}</a>
          </span>
          @else
          <i class="fa-solid fa-circle-user icon-sm"></i>
          <span class="ms-3 h5">
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark">{{ $user->name }}</a>
          </span>
          @endif
        </div>

        <div class="col text-end">
          <a href="{{route('follow.store', $user->id)}}" class="text-decoration-none text-primary">Follow</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>