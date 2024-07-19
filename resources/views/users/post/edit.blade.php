@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="container">
  <form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row mb-3 categories">
      <label for="" class="form-label fw-bold">Category (up to 3)</label>


      <div class="form-check form-check-inline mb-3">
        @foreach ($categories as $category)
        <div class="form-check form-check-inline">
          <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" class="form-check-input" @if ($post->categoryPost->contains('category_id', $category->id)) checked @endif>
          <label for="{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
        </div>
        @endforeach
      </div>


      <div class="row mb-3">
        <label for="" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="" rows="5">{{$post->description}}</textarea>
      </div>
      <div class="row mb-3">
        <div class="col">

          <label for="" class="form-label fw-bold d-block">Image</label>
          <img src="{{$post->image}}" alt="" class="border p-1 rounded mb-2">
          <input type="file" name="image" id="image" class="form-control">
          <p class="text-secondary">
            <!-- <div class="form-text"></div> -->
            The acceptable formats are jpeg, jpg, gif, and png only.
            <br>
            Max file size is 1048kb.
          </p>
        </div>
        <div class="col">

        </div>

      </div>
      <div class="row mb-3">
        <button type="submit" class="btn bg-warning text-white w-25">Save</button>
      </div>
  </form>
</div>

@endsection