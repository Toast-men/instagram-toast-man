@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container">
  @include('users.profile.hearder')

  <div class="mt-5 row">
    @forelse ($user->post as $post )
    <div class="col-4">
      <a href="{{route('post.show', $post)}}" style="display:block">
        <div class="squre-img">
          <img src="{{$post->image}}" alt="" class="img-fluid img-thumbnail profile-post">
        </div>
      </a>
    </div>
    @empty

    @endforelse
  </div>
</div>
@endsection