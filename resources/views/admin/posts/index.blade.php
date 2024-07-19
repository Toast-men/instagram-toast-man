@extends('layouts.app')

@section('title', 'Admin Posts')

@section('content')

      <div class="table-responsive">
        <table class="table">
          <thead class="table-primary text-uppercase">
            <tr>
              <th scope="col"></th>
              <th scope="col">category</th>
              <th scope="col">owner</th>
              <th scope="col">Created at</th>
              <th scope="col">status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          @foreach ($all_posts as $post)
          <tbody class="">
            <tr class="">
              <td scope="row align-items-center">
                <img src="{{$post->image}}" alt="" class="image-lg">
              </td>
              <td class="align-middle">
                @foreach ($post->categoryPost as $category_post )
                  <p>{{$category_post->category->name}}</p>
                @endforeach
                <p class="my-auto"></p>
              </td>
              <td class="align-middle">
                <p>{{$post->user->name}}</p>
              </td>
              <td class="align-middle">
                <p>{{$post->created_at}}</p>
              </td>
              <td class="align-middle">
                @if ($post->trashed())
                <i class="fa-regular fa-circle"></i>
                <span>Hidden</span>
                @else
                <i class="fa-solid fa-circle text-primary"></i><span> Visible</span>
                @endif
              </td>
              <td class="align-middle">
                <div class="dropdown open">
                  <button
                    class="btn "
                    type="button"
                    id="triggerId"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="triggerId">
                    @if ($post->trashed())
                    <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#unhideModal-{{$post->id}}"><i class="fa-solid fa-user-slash"></i>Unhide Post{{$post->id}}</button>
                    @else
                      <button type="button" class="btn dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hiddenModal-{{$post->id}}"><i class="fa-solid fa-user-slash"></i>Hidden Post{{$post->id}}</button>
                    @endif
                  </div>
                </div>  
              </td>
            </tr>
           



          </tbody>
          @include('admin.posts.modal.hidden')
          @include('admin.posts.modal.visible')
          @endforeach
          
        </table>
        <div class="d-flex justify-content-center">
            {{ $all_posts->links()}}
        </div>
      </div>
  
@endsection


