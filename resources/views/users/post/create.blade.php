@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="container">
  <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3 categories">
      <label for="" class="form-label fw-bold">Category (up to 3)</label>


      <div class="form-check form-check-inline mb-3">
        @foreach ($categories as $category)
        <div class="form-check form-check-inline">
          <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" class="form-check-input">
          <label for="{{ $category->id }}" class="form-check-label">{{$category->name}}</label>
        </div>
        @endforeach
      </div>

      <div class="row mb-3">
        <label for="" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="What's on your mind?" rows="5"></textarea>
      </div>
      <div class="row mb-3">
        <label for="" class="form-label fw-bold">Image</label>
        <input type="file" name="image" id="image" class="form-control">
        <p class="text-secondary">
        <!-- <div class="form-text"></div> -->
          The acceptable formats are jpeg, jpg, gif, and png only.
          <br>
          Max file size is 1048kb.
        </p>
      </div>
      <div class="row mb-3">
        <button type="submit" class="btn bg-primary text-white w-25">Post</button>
      </div>
  </form>
</div>

@endsection