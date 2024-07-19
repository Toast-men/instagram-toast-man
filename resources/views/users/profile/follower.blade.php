@extends('layouts.app')

@section('title','Followers')

@section('content')
@include('users.profile.hearder')

<div class="container mx-auto w-50 follower">
  <div class="text-center">
    <h2>Follower</h2>
  </div>
  @if (!$user->followers)
  <h3 class="text-center mt-5">No follower yet</h3>
  @else
    <!-- relationでmodel作成後、インスタンス化して1つずつ使ってまたリレーションを使う -->
    @foreach ($user->followers as $follower)
    <div class="row align-items-center mt-4">
      <div class="col-auto">
        @if ($follower->follower->avatar)
        <img src="{{$follower->follower->avatar}}" alt="#" class="rounded-circle avatar-sm">
        @else
        <i class="fa-solid fa-circle-user icon-sm"></i>
        @endif
      </div>
      <div class="col ps-1">
        <a href="{{route('profile.show', $follower->follower->id)}}" class="text-decoration-none text-dark h5">{{ $follower->follower->name }}</a>
      </div>
      @if ($follower->follower->id != auth()->user()->id)
        <div class="col text-end">
        @if (!$follower->follower->isFollowed())
        <a href="{{route('follow.store', $follower->follower->id)}} " class="text-decoration-none text-primary">Follow</a>
        @else
        <a href="{{route('follow.destroy', $follower->follower->id)}} " class="text-decoration-none text-black">Unfollow</a>
        @endif
      </div>
      @endif
      
    </div>
    @endforeach
  
</div>

@endif
@endsection