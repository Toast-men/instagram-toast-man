<div class="row text-justify-center">
    <div class="col-4 text-sm-center">
      @if ($user->avatar)
      <img src="{{$user->avatar}}" alt="#" class="rounded-circle avatar-lg">
      @else
      <i class="fa-solid fa-circle-user" style="font-size:200px;"></i>
      @endif
    </div>
    <div class="col-8">
      <div class="row">
        @if ($user == Auth()->user())
        <p class="display-4">{{$user->name}} <span class="ms-3"><a href="{{route('profile.edit')}}" class="btn btn-outline-secondary">Edit Profile</a></span></p>
        @else
        @if ($user->isFollowed())
        <p class="display-4">{{$user->name}} <span class="ms-3"><a href="{{route('follow.destroy', $user->id)}}" class="btn btn-outline-secondary">Unfollow</a></span></p>

        @else
        <p class="display-4">{{$user->name}} <span class="ms-3"><a href="{{route('follow.store', $user->id)}}" class="btn btn-outline-primary">Follow</a></span></p>
        @endif
        @endif

      </div>
      <div class="row display-flex">
        <div class="d-flex justify-content-start">
          <a href="" class="me-4 text-decoration-none text-black h4"><span>{{ $user->post->count() }}</span>{{$user->post->count() <= 1? ' Post' : ' Posts'}}</a>
          <a href="{{route('profile.follower', $user->id)}}" class="me-4 text-decoration-none text-black h4"><span>{{ $user->followers->count() }}</span>{{$user->followers->count() <= 1? ' Follower' : ' Followers'}}</a>
          <a href="{{route('profile.following', $user->id)}}" class="text-decoration-none text-black h4"><span>{{ $user->followings->count() }}</span>{{$user->followings->count() <= 1? ' Following' : ' Followings'}}</a>
        </div>





      </div>


    </div>

  </div>