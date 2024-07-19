@extends('layouts.app')

@section('title', 'Search')

@section('content')
<div class="container mt5 w-50">
  <h4>Search results for "{{$keyword}}"</h4>

  @if ($users)
  @foreach ($users as $user)
  <div class="row align-items-center mt-3">
    <div class="col-auto d-flex align-items-center">
      @if ($user->avatar)
      <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-md">

      @else
      <i class="fa-solid fa-circle-user icon-md"></i>

      @endif
    </div>
    <div class="col-auto">
      <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark">{{ $user->name }}<br>
        {{$user->email}}</a>

    </div>


    <div class="col text-end">
      @if ($user->name == auth()->user()->name)
        
      @else
      @if ($user->isFollowed())
      <a href="{{route('follow.destroy', $user->id)}}" class="btn btn-outline-secondary text-decoration-none text-secondary">Following</a>
      @else
        <a href="{{route('follow.store', $user->id)}}" class="btn btn-outline-primary text-decoration-none text-primary">Follow</a>
      @endif
        
      @endif
      
    </div>
  </div>
  @endforeach
  @else

  @endif
</div>



@endsection