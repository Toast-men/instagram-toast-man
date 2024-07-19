@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container w-50 bg-white">
  <p class="h2">Update Profile</p>
  <div>
    <form action="{{route('profile.update' ,['id' => auth()->user()->id])}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    
  
  <div class="row mt-5">
    <div class="col-4">
      @if (Auth::user()->avatar)
      <img src="{{Auth::user()->avatar}}" alt="#" class="rounded-circle avatar-lg">
      @else
      <i class="fa-solid fa-circle-user" style="font-size:200px;"></i>
      @endif
    </div>
    <div class="col-8">
    <label for="" class="form-label fw-bold">Image</label>
        <input type="file" name="image" id="image" class="form-control">
        <p class="text-muted">
        <!-- <div class="form-text"></div> -->
          The acceptable formats are jpeg, jpg, gif, and png only.
          <br>
          Max file size is 1048kb.
        </p>
    </div>

  </div>

  <div class="row mt-5">
    <label for="" class="form-label">
      Name
    </label>
    <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
  </div>

  <div class="row mt-3">
    <label for="" class="form-label">
      Email
    </label>
    <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
  </div>

  <div class="row mt-3">
    <label for="" class="form-label">
      Introduction
    </label>
    <textarea name="introduction" id="introduction" placeholder="Describe yourself" rows="6"></textarea>
  </div>

  <div class="row mt-3">
    <button type="submit" class="btn btn-warning">Save</button>
  </div>

  </form>




</div>

</div>

@endsection