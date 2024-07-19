@extends('layouts.app')

@section('title', 'Admin Categories')

@section('content')

<form action="{{route('admin.categories.store')}}" method="post" class="mb-4">
  @csrf
  <div class="row">
    <div class="col-4">
      <input type="text" value="" placeholder="Add a category" class="form-control d-inline-block" name="name">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">+Add</button>
    </div>
  </div>
</form>

<div class="row">
  <div class="col-8">
    <table class="table table-hover align-middle bg-white text-center">
      <thead class="table-warning text-uppercase">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Count</th>
          <th>last updated</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($categories as $category )
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->categoryPost->count()}}</td>
            <td>{{$category->updated_at}}</td>
            <td>
              <!-- Modal trigger button -->
              <button
                type="button"
                class="btn btn-outline-warning"
                data-bs-toggle="modal"
                data-bs-target="#category-edit-{{$category->id}}"
              >
                <i class="fa-solid fa-pen"></i>
              </button>

              <button
                type="button"
                class="btn btn-outline-danger"
                data-bs-toggle="modal"
                data-bs-target="#category-delete-{{$category->id}}"
              >
                <i class="fa-solid fa-trash-can"></i>
              </button>
              
            </td>
          </tr>
          

          @include('admin.categories.modal.delete')
          @include('admin.categories.modal.edit')
        @endforeach
        
      </tbody>
      
          <tr>
          <td colspan="2">Uncategorized
            <p class="xsmall mb-0 text-muted">Hidden posts are not included.</p></td>
          <td>{{$uncategorized_posts}}</td>
          <td colspan="2">
            
          </td>
          </tr>
          
    </table>
  </div>
</div>

@endsection