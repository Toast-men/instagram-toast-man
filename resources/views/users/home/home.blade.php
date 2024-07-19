@extends('layouts.app')

@section('title', 'Homepage')

@section('content')



<div class="row">
    @include('users.home.post')
    @include('users.home.side')
</div>
@endsection