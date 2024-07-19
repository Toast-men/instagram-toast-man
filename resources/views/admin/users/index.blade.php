@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')

      <div class="table-responsive">
        <table class="table">
          <thead class="table-success text-uppercase">
            <tr>
              <th scope="col"></th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Created at</th>
              <th scope="col">status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          @foreach ($all_users as $user)
          <tbody class="">
            <tr class="">
              <td scope="row align-items-center">
                @if ($user->avatar)
                <img src="{{$user->avatar}}" alt="" class="avatar-md rounded-circle">

                @else
                <i class="fa-solid fa-circle-user icon-md"></i>
                @endif
              </td>
              <td class="align-middle">
                <p class="my-auto">{{$user->name}}</p>
              </td>
              <td class="align-middle">
                <p>{{$user->email}}</p>
              </td>
              <td class="align-middle">
                <p>{{$user->created_at}}</p>
              </td>
              <td class="align-middle">
                @if ($user->deleted_at)
                <i class="fa-regular fa-circle"></i>
                <span>Inactive</span>
                @else
                <i class="fa-solid fa-circle text-success"></i><span> Active</span>
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
                    @if ($user->trashed())
                    <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#reactiveModal-{{$user->id}}"><i class="fa-solid fa-user-slash"></i>Reactivate {{$user->name}}</button>
                    @else
                      <button type="button" class="btn dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactiveModal-{{$user->id}}"><i class="fa-solid fa-user-slash"></i>Deactivate {{$user->name}}</button>
                    @endif
                  </div>
                </div>  
              </td>
            </tr>
           



          </tbody>
          @include('admin.users.modal.reactive') 
          @include('admin.users.modal.deactive') 
          @endforeach
          
        </table>
        <div class="d-flex justify-content-center">
            {{ $all_users->links()}}
        </div>
      </div>
  
@endsection


