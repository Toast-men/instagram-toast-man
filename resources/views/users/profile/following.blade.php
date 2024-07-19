@extends('layouts.app')

@section('title','Followings')

@section('content')
@include('users.profile.hearder')

<div class="container mx-auto w-50 followings">
  <div class="text-center">
    <h2>followings</h2>
  </div>
  @if (!$user->followings)
  <h3 class="text-center mt-5">No followings yet</h3>
  @else
    <!-- relationでmodel作成後、インスタンス化して1つずつ使ってまたリレーションを使う -->
    @foreach ($user->followings as $following)
    <div class="row align-items-center mt-4">
      <div class="col-auto">
        @if ($following->following->avatar)
        <img src="{{$following->following->avatar}}" alt="#" class="rounded-circle avatar-sm">
        @else
        <i class="fa-solid fa-circle-user icon-sm"></i>
        @endif
      </div>
      <div class="col ps-1">
        <a href="{{route('profile.show', $following->following->id)}}" class="text-decoration-none text-dark h5">{{ $following->following->name }}</a>
      </div>
      @if ($following->following->id != auth()->user()->id)
        <div class="col text-end">
        @if ($following->following->isFollowed())
        <a href="{{route('follow.destroy', $following->following->id)}} " class="text-decoration-none text-black">Unfollow</a>
        
        @else
        <a href="{{route('follow.store', $following->following->id)}} " class="text-decoration-none text-primary">Follow</a>
        @endif
      </div>
      @endif
      
    </div>
    @endforeach
  
</div>

@endif
@endsection