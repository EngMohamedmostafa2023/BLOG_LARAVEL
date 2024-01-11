@extends('layouts.app')
@section('title' )  show @endsection
@section('content')
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header">
              post info
            </div>
            <div class="card-body">
              <h5 class="card-title">title: {{ $singlePostFormDB->title }}</h5>
              <p class="card-text">description : {{ $singlePostFormDB->description }}</p>

            </div>
          </div>
          <div class="card  mt-5">
            <div class="card-header">
              post creator info
            </div>
            <div class="card-body">
              <h5 class="card-title">name:   {{ $singlePostFormDB->user ? $singlePostFormDB->user->name : "not found"  }}  </h5>
              <p class="card-text">email:   {{ $singlePostFormDB->user ? $singlePostFormDB->user->email : "not found"  }}  </p>
              <p class="card-text"> created_at:   {{ $singlePostFormDB->user ? $singlePostFormDB->user->created_at : "not found"  }} </p>
            </div>
          </div>
    </div>

@endsection
